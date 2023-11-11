<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::all();
        return view('home.member.index',compact(['member']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.member.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    // Mendapatkan member terakhir berdasarkan nomor urut (descending)
    $latestMember = Member::latest('id')->first();

    // Mendapatkan nomor urut dari ID sebelumnya
    $lastNumber = $latestMember ? intval(substr($latestMember->id, 2)) : 0;

    // Membuat ID baru dengan format "M-XX"
    $newNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
    $newId = 'M-' . $newNumber;

    // Validasi data
    $validate = $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required',
    ]);

    // Menetapkan nilai ID secara manual
    $request->merge(['id' => $newId]);

    // Menyimpan data dengan menggunakan create
    Member::create($request->except('_token'));
    
    return redirect('/member')->with($validate)->with('success', 'Berhasil tambah data');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('home.member.edit',compact('member'));
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
            'nama'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
        ]);
        $member = Member::find($id);
        $member->update([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp,
            $request->except(['_token']),
        ]);
        return redirect('/member')->with($validate)->with($validate)->with('success1','berhasil menghapus data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect('/member')->with('success2','berhasil menghapus data');
    }
}
