<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarBeasiswa extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function provinsiModel(){
        return $this->belongsTo(Provinsi::class,'id_provinsis','id_provinsis');
    }

    public function kota(){
        return $this->belongsTo(Kota::class,'id_kotas','id_kotas');
    }
}
