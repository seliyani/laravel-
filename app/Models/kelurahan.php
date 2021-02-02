<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    protected $fillable = ['id_kecamatan', 'nama_kelurahan'];
    protected $table = "kelurahans";
    public $timestemps = true;

    public function kecamatan(){
    return $this->belongsTo('App\Models\kecamatan', 'id_kecamatan');
}
    public function rw(){
    return $this->hasMany('App\Models\rw', 'id_rw');
}
   use HasFactory;

}
