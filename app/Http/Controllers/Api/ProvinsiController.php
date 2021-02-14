<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Validator;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::latest()->get();
        return response([
            'success' => true,
            'message' => 'List data provinsi',
            'data' => $provinsi
        ], 200);
    }
    
    public function store(Request $request)
    {
       //validate data
       $validator = Validator::make($request->all(), [
        'kode_provinsi'     => 'required',
        'nama_provinsi'   => 'required',
    ],
        [
            'kode_provinsi' => 'Masukkan kode provinsi !',
            'nama_provinsi' => 'Masukkan Nama provinsi !',
        ]
    );

    if($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Silahkan Isi Bidang Yang Kosong',
            'data'    => $validator->errors()
        ],400);

    } else {

        $provinsi = Provinsi::create([
            'kode_provinsi'     => $request->input('kode_provinsi'),
            'nama_provinsi'   => $request->input('nama_provinsi')
        ]);


        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'provinsi Berhasil Disimpan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'provinsi Gagal Disimpan!',
            ], 400);
        }
    }
}

    public function show($id)
    {
        $provinsi = Provinsi::whereId($id)->first();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Detail provinsi!',
                'data'    => $provinsi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'provinsi Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
          //validate data
          $validator = Validator::make($request->all(), [
            'kode_provinsi'     => 'required',
            'nama_provinsi'   => 'required',
        ],
            [
                'kode_provinsi.required' => 'Masukkan kode_provinsi provinsi !',
                'nama_provinsi.required' => 'Masukkan nama_provinsi provinsi !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $provinsi = Provinsi::whereId($request->input('id'))->update([
                'kode_provinsi'     => $request->input('kode_provinsi'),
                'nama_provinsi'   => $request->input('nama_provinsi'),
            ]);


            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'provinsi Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'provinsi Gagal Diupdate!',
                ], 500);
            }

        }
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'provinsi Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'provinsi Gagal Dihapus!',
            ], 500);
        }
    
    }
}
