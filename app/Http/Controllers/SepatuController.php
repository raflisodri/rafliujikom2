<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use App\Models\Sepatu;
use Illuminate\Http\Request;

class SepatuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sepatu = Sepatu::all();
        $suplier = Suplier::all();
        return view('home.sepatu.index',compact(['sepatu','suplier']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suplier = Suplier::all();
        return view('home.sepatu.tambah',compact(['suplier']));
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
            'id_suplier'=>'required',
            'nama'=>'required',
            'merk'=>'required',
            'jenis'=>'required',
            'stok'=>'required',
            'ukuran'=>'required',
            'warna'=>'required',
            'harga'=>'required',
        ]);
        Sepatu::create([
            'id_suplier'=>$request->id_suplier,
            'nama'=>$request->nama,
            'merk'=>$request->merk,
            'jenis'=>$request->jenis,
            'stok'=>$request->stok,
            'ukuran'=>$request->ukuran,
            'warna'=>$request->warna,
            'harga'=>$request->harga,
            $request->except(['_token']),
        ]);
        return redirect('/sepatu')->with($validate)->with('success','berhasil tambah data');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sepatu = Sepatu::find($id);
        $suplier = Suplier::all();
        return view('home.sepatu.edit',compact(['sepatu','suplier']));
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
          
        $validate = $request->validate([
            'id_suplier'=>'required',
            'nama'=>'required',
            'merk'=>'required',
            'jenis'=>'required',
            'stok'=>'required',
            'ukuran'=>'required',
            'warna'=>'required',
            'harga'=>'required',
        ]);
        $sepatu = Sepatu::find($id);
        $sepatu->update([
            'id_suplier'=>$request->id_suplier,
            'nama'=>$request->nama,
            'merk'=>$request->merk,
            'jenis'=>$request->jenis,
            'stok'=>$request->stok,
            'ukuran'=>$request->ukuran,
            'warna'=>$request->warna,
            'harga'=>$request->harga,
            $request->except(['_token']),
        ]);
        return redirect('/sepatu')->with($validate)->with($validate)->with('success1','berhasil menghapus data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sepatu = Sepatu::find($id);
        $sepatu->delete();
        return view('home.sepatu.tambah',compact(['sepatu']))->with('success2','berhasil menghapus data');
    }
}
