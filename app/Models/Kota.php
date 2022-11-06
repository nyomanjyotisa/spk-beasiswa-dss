<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kotas';
    protected $guarded=[];

    public function provinsiModel(){
        return $this->belongsTo(Provinsi::class,'id_provinsis','id_provinsis');
    }
}
