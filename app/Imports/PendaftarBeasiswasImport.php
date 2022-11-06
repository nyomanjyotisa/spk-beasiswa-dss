<?php

namespace App\Imports;

use App\Models\PendaftarBeasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendaftarBeasiswasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PendaftarBeasiswa([
            'nama' => $row["nama"],
            'kelamin' => $row["kelamin"], 
            'nik' => $row["nik"],
            'telpon' => $row["telpon"], 
            'alamat' => $row["alamat"], 
            'id_provinsis' => $row["id_provinsis"], 
            'id_kotas' => $row["id_kotas"], 
            'kondisi_rumah' => $row["kondisi_rumah"], 
            'ip' => $row["ip"], 
            'ipk' => $row["ipk"], 
            'penghasilan_orangtua' => $row["penghasilan_orangtua"], 
            'tanggungan_orangtua' => $row["tanggungan_orangtua"], 
        ]);
    }
}
