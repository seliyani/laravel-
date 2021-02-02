<?php

namespace App\Http\Controllers;
use App\Models\Provinsi;
use App\Http\Controllers\DB;

use Illuminate\Http\Request;

class provinsiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //menampilkan index
        $provinsi = Provinsi::all();
        return view('provinsi.index',compact('provinsi'));
        }
        public function create()
    {
        //menampilkan create
        return view('provinsi.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode_provinsi' => 'required|max:5|unique:provinsis',
            'nama_provinsi' => 'required|unique:provinsis'
        ],[
            'kode_provinsi.required' => 'Kode Provinsi Tidak Boleh Kosong',
            'kode_provinsi.max' => 'Kode Maksimal 5 Karakter',
            'kode_provinsi.unique' => 'Kode Provinsi Sudah Terdaftar',
            'nama_provinsi.required' => 'Nama Provinsi Tidak Boleh Kosong',
            'nama_provinsi.unique' => 'Nama Provinsi Sudah Terdaftar'
        ]);
        //menambahkan data
        $provinsi = new Provinsi; //menampung model
        $provinsi->kode_provinsi  /*nama field*/ = $request->kode_provinsi; //name
        $provinsi->nama_provinsi  /*nama field*/ = $request->nama_provinsi; 
        $provinsi->save(); //untuk menyimpan data suatu inputan
        return redirect()->route('provinsi.index');

    }
    public function show($id)
    {
        //menampilkan data
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.show',compact('provinsi'));

    }
    public function edit($id)
    {
        //mengedit data
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.edit',compact('provinsi'));
    }
    public function update(Request $request, $id)
    {
        //mengupdate data
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index');

    }
    public function destroy( $id)
    {
        //menghapus data
        $provinsi = Provinsi::findOrFail($id)->delete();
        return redirect()->route('provinsi.index')
                ->with(['message'=>'kereta berhasil dihapus']);
    }
    //

}
