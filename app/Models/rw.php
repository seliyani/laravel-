<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    protected $fillable = ['id_kelurahan', 'nama'];
    protected $table = "rws";
    public $timestemps = true;

    public function kelurahan(){
    return $this->belongsTo('App\Models\kelurahan', 'id_kelurahan');
}
    public function kasus2(){
    return $this->hasMany('App\Models\kasus2', 'id_rw');
}
   use HasFactory;
}
