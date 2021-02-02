<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
      
    }
    public function index()
    {
         //menampilkan index
         $kota = kota::with('provinsi')->get();
         return view('kota.index',compact('kota'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $provinsi = Provinsi::all();
        return view('kota.create',compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kota' => 'required|max:5|unique:kotas',
            'nama_kota' => 'required|unique:kotas'
        ],[
            'kode_kota.required' => 'Kode kota Tidak Boleh Kosong',
            'kode_kota.max' => 'Kode Maksimal 5 Karakter',
            'kode_kota.unique' => 'Kode kota Sudah Terdaftar',
            'nama_kota.required' => 'Nama kota Tidak Boleh Kosong',
            'nama_kota.unique' => 'Nama kota Sudah Terdaftar'
        ]);
        //
       $kota = new Kota();
       $kota->id_provinsi = $request->id_provinsi;
       $kota->kode_kota = $request->kode_kota;
       $kota->nama_kota = $request->nama_kota;
       $kota->save();
       return redirect()->route('kota.index')
       ->with(['message'=>'Data berhasil dibuat']);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        return view('kota.show',compact('kota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $provinsi = Provinsi::all();
        $kota = Kota::findOrFail($id);
       
        // dd($select);
        return view('kota.edit',compact('kota','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kota = Kota::findOrFail($id);
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
         return redirect()->route('kota.index')
                     ->with(['message'=>'Data berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $kota = Kota::findOrFail($id)->delete();
        return redirect()->route('kota.index')
                ->with(['message'=>'kereta berhasil dihapus']);
    }
}