<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(Auth()->User()->level == 'kasir'){
        // Auth::logout();
        // return redirect('login')->with('error1','You dont have permission');
        // }else{
            $user = User::all();
            return view('home.user.index',compact(['user']));
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.user.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->file('foto');
        $name = hexdec(uniqid());
        $ext = strtolower($img->getClientOriginalExtension());
        $foto = $name.'.'.$ext;
        $img->move('foto/',$foto);

        $validate = $request->validate([
            'name'=>'required',
            'username'=>'required',
            'password'=>'required',
            'level'=>'required',
        ]);
        User::create([
            'name'=>$request->name,
            'foto'=>$foto,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'level'=>$request->level,
            $request->except(['_token']),
        ]);
        return redirect('/user')->with($validate)->with('success','berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('home.user.edit',compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
            'name'=>'required',
            'username'=>'required',
            'password'=>'required',
            'level'=>'required',
        ]);
        $user = User::find($id);
        $user->update([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'level'=>$request->level,
            $request->except(['_token']),
        ]);
        return redirect('/user')->with($validate)->with('success1','berhasil menghapus data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user')->with('success2','berhasil menghapus data');
    }
}
