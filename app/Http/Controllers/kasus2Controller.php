<?php

namespace App\Http\Controllers;
use App\Models\rw;
use App\Models\kasus2;
use App\Http\Controllers\DB;

use Illuminate\Http\Request;

class kasus2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kasus2 = kasus2::with('rw.kelurahan.kecamatan.kota.provinsi')->get();
        return view('kasus2.index',compact('kasus2'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rw = rw::all();
        return view('kasus2.create',compact('rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kasus2= new kasus2();
        $kasus2->id_rw = $request->id_rw;
        $kasus2->jumlah_positif = $request->jumlah_positif;
        $kasus2->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus2->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus2->tanggal = $request->tanggal;
        $kasus2->save();
        return redirect()->route('kasus2.index')
            ->with(['message'=>'Data Berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasus2 = kasus2::findOrFail($id);
        return view('kasus2.show',compact('kasus2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = rw::all();
        $kasus2 = kasus2::findOrFail($id);
        return view('kasus2.edit',compact('kasus2','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kasus2 = kasus2::findOrFail($id);
        $kasus2->id_rw = $request->id_rw;
        $kasus2->jumlah_positif = $request->jumlah_positif;
        $kasus2->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus2->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus2->tanggal = $request->tanggal;
        $kasus2->save();;
        return redirect()->route('kasus2.index')
            ->with(['message'=>'Data Berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasus2 = kasus2::findOrFail($id)->delete();
        return redirect()->route('kasus2.index')
                        ->with(['message1'=>'Berhasil dihapus']);
    } 
}
