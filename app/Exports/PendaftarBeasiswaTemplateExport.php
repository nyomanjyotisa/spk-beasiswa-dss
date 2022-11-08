<?php

namespace App\Exports;

use App\Models\PendaftarBeasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarBeasiswaTemplateExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PendaftarBeasiswa::where("id_pendaftar_beasiswas",-1)->get();
    }

    public function headings(): array
    {
        return [
            'nama',
            'kelamin',
            'nik',
            'telpon',
            'alamat',
            'id_provinsis',
            'id_kotas',
            'kondisi_rumah',
            'ip',
            'ipk',
            'penghasilan_orangtua',
            'tanggungan_orangtua',
        ];
    }
}
