<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use App\Models\Member;
use App\Models\Sepatu;
use Illuminate\Http\Request;

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
        return view('home.transaksi.index',compact('transaksi','user','member','sepatu'));     
    }

    public function detail($id) {
        $transaksi = Transaksi::find($id);
        return view('home.transaksi.detail',compact('transaksi'));
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
        return view('home.transaksi.tambah',compact('user','member','sepatu'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ids = $request->id_sepatu;
        $sepatu = Sepatu::find($ids);
        $total = $sepatu->harga * $request->jumlah;
        $validate = $request->validate([
            'id_user'=>'required',
            'id_member'=>'required',
            'id_sepatu'=>'required',
            'tanggal'=>'required',
            'jumlah'=>'required',
          
        ]);
        Transaksi::create([
            'id_user'=>$request->id_user,
            'id_member'=>$request->id_member,
            'id_sepatu'=>$request->id_sepatu,
            'tanggal'=>$request->tanggal,
            'jumlah'=>$request->jumlah,
            'total'=>$total,
            $request->except(['_token']),
        ]);
        $sepatu->update([
            'stok'=>$sepatu->stok - $request->jumlah,
            $request->except(['_token']),
        ]);

        return redirect('/transaksi')->with($validate)->with('success','berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        $user = User::all();
        $member = Member::all();
        $sepatu = Sepatu::all();
        return view('home.transaksi.edit',compact('transaksi','user','member','sepatu'));  
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
        $sepatu = Sepatu::find($request->id_sepatu);
        $total = $sepatu->harga * $request->jumlah;
        $validate = $request->validate([
            'id_user'=>'required',
            'id_member'=>'required',
            'id_sepatu'=>'required',
            'tanggal'=>'required',
            'jumlah'=>'required',
            'total'=>'required',
        ]);
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'id_user'=>$request->id_user,
            'id_member'=>$request->id_member,
            'id_sepatu'=>$request->id_sepatu,
            'tanggal'=>$request->tanggal,
            'jumlah'=>$request->jumlah,
            'total'=>$total,
            $request->except(['_token']),
        ]);
        return redirect('/transaksi')->with($validate)->with($validate)->with('success1','berhasil menghapus data');
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
            'stok'=>$sepatu->stok + $jumlah,
        ]);
        return redirect('/transaksi')->with('success2','berhasil menghapus data');
    }

    public function cetak() {
        $transaksi = Transaksi::all();
        $user = User::all();
        $member = Member::all();
        $sepatu = Sepatu::all();
        return view('home.transaksi.cetak',compact('transaksi','user','member','sepatu'));  
    }
    public function struk($id) {
        $transaksi = Transaksi::find($id);
        $user = User::all();
        $member = Member::all();
        $sepatu = Sepatu::all();
        return view('home.transaksi.struk',compact('transaksi','user','member','sepatu'));  
    }
}
