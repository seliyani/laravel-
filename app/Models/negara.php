<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class negara extends Model
{
    use HasFactory;

    protected $table = "negaras";

    public function kasus(){
        return $this->hasMany(kasus::class);
    }
}
