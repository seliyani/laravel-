<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $fillable = ['id_kota', 'kode_kecamatan', 'nama_kecamatan'];
    protected $table = "kecamatans";
    public $timestemps = true;

    public function kota(){
    return $this->belongsTo('App\Models\kota', 'id_kota');
}
    public function kelurahan(){
    return $this->hasMany('App\Models\Kelurahan', 'id_kelurahan');
}
   use HasFactory;
}
