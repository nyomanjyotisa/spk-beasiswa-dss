<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBeasiswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_penerima_beasiswas';
    protected $guarded=[];

    public function dataPenerima(){
        return $this->belongsTo(PendaftarBeasiswa::class, 'id_pendaftar_beasiswas', 'id_pendaftar_beasiswas');
    }

    public function provinsiModel(){
        return $this->belongsTo(Provinsi::class,'id_provinsis','id_provinsis');
    }

    public function kota(){
        return $this->belongsTo(Kota::class,'id_kotas','id_kotas');
    }
}
