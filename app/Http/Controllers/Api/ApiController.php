<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use App\Models\Kasus2;
use DB;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public $data = [];
    public function global()
    {
        
        $response = Http::get( 'https://api.kawalcorona.com/global/' )->json();
        foreach ($response as $data => $val){
            $raw =$val['attributes'];
            $res = [
                'Negara' => $raw['Country_Region'],
                'Positif' => $raw ['Confirmed'],
                'Sembuh' => $raw ['Recovered'],
                'meninggal' => $raw ['Deaths']
            ];
            array_push($this->data, $res);
         }
            $data = [
                'success' => true,
                'data' => $this->data,
                'message' => 'berhasil'
            ];
            return response()->json($data,200);

    }
    public function provinsi()
    {
        $provinsi = DB::table('provinsis')
                    ->select('provinsis.nama_provinsi',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))
                        ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')    
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->groupBy('provinsis.id')
                        ->get();

                        $provinsi2 = DB::table('provinsis')
                        ->select('provinsis.nama_provinsi',
                        DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                        DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                        DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))
                            ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')    
                            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                            ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                            ->whereDate('kasus2s.tanggal', date('Y-m-d'))
                            ->groupBy('provinsis.id')
                            ->get();
                            $arr = [
                                'status' => 200,
                                'data' => [     
                                'Hari Ini' =>[$provinsi2],
                                'Total' =>[$provinsi]
                                ],
                                'message' => 'Berhasil'
                            ];
                            return response()->json($arr, 200);
                
    }
    public function showKasus($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi = DB::table('provinsis')
                    ->select('provinsis.nama_provinsi',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))
                        ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')    
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->where('provinsis.id', $id)
                        ->groupBy('provinsis.id')
                        ->get();
                    return response()->json($provinsi, 200);    

    }
    public function all()
    {
        $positif = DB::table('rws')
                   ->select('kasus2s.jumlah_positif',
                   'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                   ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                   ->sum('kasus2s.jumlah_positif');
        $sembuh = DB::table('rws')
                   ->select('kasus2s.jumlah_sembuh',
                   'kasus2s.jumlah_positif', 'kasus2s.jumlah_meninggal')
                   ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                   ->sum('kasus2s.jumlah_sembuh');
        $meninggal = DB::table('rws')
                   ->select('kasus2s.jumlah_meninggal',
                   'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_positif')
                   ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                   ->sum('kasus2s.jumlah_meninggal');
        return response([
            'success' => true,
            'data' => 'Data Indonesia',
                      'Jumlah Positif' => $positif,
                      'Jumlah Sembuh' => $sembuh,
                      'Jumlah Meninggal' => $meninggal,
            'message' => 'Berhasil'
        ], 200);
    }

    public function kota()
    {
        $kota = DB::table('kotas')
                    ->select('kotas.nama_kota',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal')) 
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->groupBy('kotas.id')
                        ->get();

                        $kota2 = DB::table('kotas')
                        ->select('kotas.nama_kota',
                        DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                        DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                        DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))  
                            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                            ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                            ->whereDate('kasus2s.tanggal', date('Y-m-d'))
                            ->groupBy('kotas.id')
                            ->get();
                            $arr = [
                                'status' => 200,
                                'data' => [     
                                'Hari Ini' =>[$kota2],
                                'Total' =>[$kota]
                                ],
                                'message' => 'Berhasil'
                            ];
                            return response()->json($arr, 200);
                
    }
    public function showKasusKota($id)
    {
        $kota = Kota::findOrFail($id);
        $kota = DB::table('kotas')
                    ->select('kotas.nama_kota',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))  
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->where('kotas.id', $id)
                        ->groupBy('kotas.id')
                        ->get();
                    return response()->json($kota, 200);    

    }

    public function kecamatan()
    {
        $kecamatan = DB::table('kecamatans')
                    ->select('kecamatans.nama_kecamatan',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal')) 
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->groupBy('kecamatans.id')
                        ->get();

                        $kecamatan2 = DB::table('kecamatans')
                        ->select('kecamatans.nama_kecamatan',
                        DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                        DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                        DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))  
                            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                            ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                            ->whereDate('kasus2s.tanggal', date('Y-m-d'))
                            ->groupBy('kecamatans.id')
                            ->get();
                            $arr = [
                                'status' => 200,
                                'data' => [     
                                'Hari Ini' =>[$kecamatan2],
                                'Total' =>[$kecamatan]
                                ],
                                'message' => 'Berhasil'
                            ];
                            return response()->json($arr, 200);
                
    }
    public function showKasusKecamatan($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan = DB::table('kecamatans')
                    ->select('kecamatans.nama_kecamatan',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))  
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->where('kecamatans.id', $id)
                        ->groupBy('kecamatans.id')
                        ->get();
                    return response()->json($kecamatan, 200);    

    }

    public function kelurahan()
    {
        $kelurahan = DB::table('kelurahans')
                    ->select('kelurahans.nama_kelurahan',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan') 
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->groupBy('kelurahans.id')
                        ->get();

                        $kelurahan2 = DB::table('kelurahans')
                        ->select('kelurahans.nama_kelurahan',
                        DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                        DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                        DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))  
                            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                            ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                            ->whereDate('kasus2s.tanggal', date('Y-m-d'))
                            ->groupBy('kelurahans.id')
                            ->get();
                            $arr = [
                                'status' => 200,
                                'data' => [     
                                'Hari Ini' =>[$kelurahan2],
                                'Total' =>[$kelurahan]
                                ],
                                'message' => 'Berhasil'
                            ];
                            return response()->json($arr, 200);
                
    }
    public function showKasusKelurahan($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan = DB::table('kelurahans')
                    ->select('kelurahans.nama_kelurahan',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))  
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->where('kelurahans.id', $id)
                        ->groupBy('kelurahans.id')
                        ->get();
                    return response()->json($kecamatan, 200);    

    }

    public function rw()
    {
        $rw = DB::table('rws')
                    ->select('rws.nama',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal')) 
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->groupBy('rws.id')
                        ->get();

                        $rw2 = DB::table('rws')
                        ->select('rws.nama',
                        DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                        DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                        DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))  
                            ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                            ->whereDate('kasus2s.tanggal', date('Y-m-d'))
                            ->groupBy('rws.id')
                            ->get();
                            $arr = [
                                'status' => 200,
                                'data' => [     
                                'Hari Ini' =>[$rw2],
                                'Total' =>[$rw]
                                ],
                                'message' => 'Berhasil'
                            ];
                            return response()->json($arr, 200);
                
    }
    public function showKasusRw($id)
    {
        $rw = Rw::findOrFail($id);
        $rw = DB::table('rws')
                    ->select('rws.nama',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))      
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->where('rws.id', $id)
                        ->groupBy('rws.id')
                        ->get();
                    return response()->json($rw, 200);    

    }
}