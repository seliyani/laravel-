<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kasus2;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index(){
        $data = kasus2::all();
        $provinsi = DB::table('provinsis')
                    ->select('provinsis.nama_provinsi',
                    DB::raw('SUM(kasus2s.jumlah_positif) as positif'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as meninggal'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as sembuh'))
                        ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')    
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->groupBy('provinsis.id')
                        ->get();
                        return view('frontend.index', compact('data', 'provinsi'));
     }
}
