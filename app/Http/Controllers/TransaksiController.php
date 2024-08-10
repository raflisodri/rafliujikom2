<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Member;
use App\Models\Sepatu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $user = User::all();
        $member = Member::all();
        $sepatu = Sepatu::all();
        return view('home.transaksi.index', compact('transaksi', 'user', 'member', 'sepatu'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $member = Member::all();
        $sepatu = Sepatu::all();
        return view('home.transaksi.tambah', compact('user', 'member', 'sepatu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_user' => 'required',
            'id_member' => 'required',
            'tanggal' => 'required',
            'id_sepatu' => 'required|array', // Validasi untuk array
            'id_sepatu.*' => 'required|exists:sepatus,id', // Pastikan setiap ID sepatu ada di tabel sepatus
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        // $subtotal = 0;

        $transaksi = Transaksi::create([
            'id_user' => $request->id_user,
            'id_member' => $request->id_member,
            'tanggal' => $request->tanggal,
            'sub_total' => $request->sub_total, // Diisi nanti setelah detail transaksi dihitung
        ]);

        foreach ($request->id_sepatu as $index => $id_sepatu) {
            $sepatu = Sepatu::findOrFail($id_sepatu); // Menggunakan tabel sepatus
            $jumlah = $request->jumlah[$index];
            $harga_satuan = $sepatu->harga; // Ambil harga satuan dari sepatu
            $total = $harga_satuan * $jumlah;

            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_sepatu' => $id_sepatu,
                'harga_satuan' => $harga_satuan,
                'jumlah' => $jumlah,
                'total' => $total,
            ]);

            $sepatu->update([
                'stok' => $sepatu->stok - $jumlah,
            ]);

            // $subtotal += $total;
        }

        DB::commit();

        return redirect('/transaksi')->with('success', 'Berhasil menambah data transaksi');
        try {
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect('/transaksi')->withErrors('Gagal menambah data transaksi: ' . $e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::with('detailTransaksi.sepatu')->findOrFail($id);
        $user = User::all();
        $member = Member::all();
        $sepatu = Sepatu::all();

        return view('home.transaksi.edit', compact('transaksi', 'user', 'member', 'sepatu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'id_user' => 'required',
            'id_member' => 'required',
            'tanggal' => 'required',
            'id_sepatu.*' => 'required',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $transaksi = Transaksi::findOrFail($id);
            $transaksi->update([
                'id_user' => $request->id_user,
                'id_member' => $request->id_member,
                'tanggal' => $request->tanggal,
                'sub_total' => $request->sub_total, // Akan diperbarui setelah perhitungan detail transaksi
            ]);

            // Hapus detail transaksi lama
            $transaksi->detailTransaksi()->delete();

            // Tambahkan detail transaksi baru
            foreach ($request->id_sepatu as $index => $id_sepatu) {
                $sepatu = Sepatu::findOrFail($id_sepatu);
                $jumlah = $request->jumlah[$index];
                $harga_satuan = $sepatu->harga;
                $total = $harga_satuan * $jumlah;

                $transaksi->detailTransaksi()->create([
                    'id_sepatu' => $id_sepatu,
                    'harga_satuan' => $harga_satuan,
                    'jumlah' => $jumlah,
                    'total' => $total,
                ]);
            }

            DB::commit();

            return redirect('/transaksi')->with('success', 'Transaksi berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/transaksi')->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        $ids = $transaksi->id_sepatu;
        $jumlah = $transaksi->jumlah;
        $sepatu = Sepatu::find($ids);
        $sepatu->update([
            'stok' => $sepatu->stok + $jumlah,
        ]);
        return redirect('/transaksi')->with('success2', 'berhasil menghapus data');
    }

    public function cetak()
    {
        // Ambil transaksi beserta detailnya
        $transaksi = Transaksi::with('detailTransaksi.sepatu', 'user', 'member')->get();

        return view('home.transaksi.cetak', compact('transaksi'));
    }


    public function struk($id)
    {
        // Ambil transaksi beserta detail transaksi dan relasi lainnya
        $transaksi = Transaksi::with('detailTransaksi.sepatu', 'user', 'member')->findOrFail($id);

        // Kirim data ke view struk
        return view('home.transaksi.struk', compact('transaksi'));
    }


    public function getHarga($id)
    {
        // Cari sepatu berdasarkan ID yang diterima
        $sepatu = Sepatu::find($id);

        // Pastikan sepatu ditemukan
        if ($sepatu) {
            return response()->json(['harga' => $sepatu->harga]);
        } else {
            return response()->json(['harga' => 0], 404);
        }
    }

    public function detail($id)
    {
        $detailTransaksi = DetailTransaksi::where('id_transaksi', $id)
            ->join('sepatus', 'detail_transaksi.id_sepatu', '=', 'sepatus.id')
            ->get(['sepatus.merk', 'sepatus.nama', 'detail_transaksi.harga_satuan', 'detail_transaksi.jumlah', 'detail_transaksi.total']);

        return response()->json($detailTransaksi);
    }
}
