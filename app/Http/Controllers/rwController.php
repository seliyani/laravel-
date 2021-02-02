<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\rw;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class rwController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rw = Rw::with('kelurahan')->get();
        return view('rw.index',compact('rw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('rw.create',compact('kelurahan'));
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
            'nama' => 'required|max:5|unique:rws'
        ],[
            'nama.required' => 'Nama Rw Tidak Boleh Kosong',
            'nama.max' => 'Kode Maksimal 5 Karakter',
            'nama.unique' => 'Nama Rw Sudah Terdaftar'
        ]);
        //
        $rw= new Rw();
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->nama = $request->nama;
        $rw->save();
        return redirect()->route('rw.index')
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
        $rw = Rw::findOrFail($id);
        return view('rw.show',compact('rw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelurahan = Kelurahan::all();
        $rw = rw::findOrFail($id);
        return view('rw.edit',compact('rw','kelurahan'));
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
        $rw = Rw::findOrFail($id);
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->nama = $request->nama;
        $rw->save();
        return redirect()->route('rw.index')
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
        $kelurahan = rw::findOrFail($id)->delete();
        return redirect()->route('rw.index')
                        ->with(['message1'=>'Berhasil dihapus']);
    } 
}
