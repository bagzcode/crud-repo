<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index (){
        $data_siswa = \App\Siswa::all();
        return view('siswa.index',['data_siswa' => $data_siswa ]);
    }

    public function create(Request $request){
        \App\Siswa::create($request->all());
        return redirect('/siswa')->with('sukses','Data Siswa Baru Berhasil Ditambahkan.');
    }

    public function edit ($id){
        $siswa = \App\Siswa::find($id);
        return view('siswa.edit',['siswa' => $siswa ]);
    }

    public function update (Request $request, $id){
        $siswa = \App\Siswa::find($id);
        $siswa -> update($request->all());
        return redirect('/siswa')->with('sukses','Data Siswa Berhasil Diperbaharui.');
    }

    public function delete ($id){
        $siswa = \App\Siswa::find($id);
        $siswa -> delete($siswa);
        return redirect('/siswa')->with('sukses','Data Siswa Berhasil Dihapus.');
    }
}
