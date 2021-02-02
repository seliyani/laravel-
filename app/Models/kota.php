<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB ;


class Kota extends Model
{
        protected $fillable = ['id_provinsi', 'kode_kota', 'nama_kota'];
        protected $table = "kotas";
        public $timestemps = true;

    public function provinsi(){
     return $this->belongsTo('App\Models\Provinsi', 'id_provinsi');
    }
    public function kecamatan(){
        return $this->hasMany('App\Models\Kecamatan', 'id_kota');
    }
    use HasFactory;

  }
