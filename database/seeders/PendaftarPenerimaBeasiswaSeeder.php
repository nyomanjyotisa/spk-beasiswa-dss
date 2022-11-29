<?php

namespace Database\Seeders;

use App\Models\Data;
use App\Models\PendaftarBeasiswa;
use App\Models\PenerimaBeasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendaftarPenerimaBeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Data::create([
            'label' => 'jumlah_penerima_per_periode',
            'value' => 5,
        ]);
        for ($i = 1; $i < 50; $i++) {

            if($i < 10){
                PendaftarBeasiswa::create([
                    'nama' => 'Manusia ' . $i,
                    'kelamin' => "Laki-laki",
                    'nik' => $i,
                    'telpon' => "54151",
                    'alamat' => "zzzzz",
                    'id_provinsis' => 1,
                    'id_kotas' => 1,
                    'kondisi_rumah' => "Milik Sendiri",
                    'ip' => 3.5,
                    'ipk' => 3.6,
                    'penghasilan_orangtua' => 500000,
                    'tanggungan_orangtua' => 5,
                    'nilai_perhitungan' => 80 + $i,
                    'periode_tahun' => "2022",
                    'periode_bulan' => "7",
                ]);

                PenerimaBeasiswa::create([
                    'id_pendaftar_beasiswas' => $i,
                ]);
            }else if($i < 25){
                PendaftarBeasiswa::create([
                    'nama' => 'Manusia ' . $i,
                    'kelamin' => "Laki-laki",
                    'nik' => $i,
                    'telpon' => "54151",
                    'alamat' => "zzzzz",
                    'id_provinsis' => 1,
                    'id_kotas' => 1,
                    'kondisi_rumah' => "Milik Sendiri",
                    'ip' => 3.5,
                    'ipk' => 3.6,
                    'penghasilan_orangtua' => 1000000,
                    'tanggungan_orangtua' => 5,
                    'nilai_perhitungan' => 80 + $i,
                    'periode_tahun' => "2022",
                    'periode_bulan' => "8",
                ]);

                PenerimaBeasiswa::create([
                    'id_pendaftar_beasiswas' => $i,
                ]);
            }else if($i < 40){
                PendaftarBeasiswa::create([
                    'nama' => 'Manusia ' . $i,
                    'kelamin' => "Laki-laki",
                    'nik' => $i,
                    'telpon' => "54151",
                    'alamat' => "zzzzz",
                    'id_provinsis' => 1,
                    'id_kotas' => 1,
                    'kondisi_rumah' => "Milik Sendiri",
                    'ip' => 3.5,
                    'ipk' => 3.6,
                    'penghasilan_orangtua' => 1500000,
                    'tanggungan_orangtua' => 5,
                    'nilai_perhitungan' => 80 + $i,
                    'periode_tahun' => "2022",
                    'periode_bulan' => "9",
                ]);

                PenerimaBeasiswa::create([
                    'id_pendaftar_beasiswas' => $i,
                ]);
            }else{

                PendaftarBeasiswa::create([
                    'nama' => 'Manusia ' . $i,
                    'kelamin' => "Laki-laki",
                    'nik' => $i,
                    'telpon' => "54151",
                    'alamat' => "zzzzz",
                    'id_provinsis' => 33,
                    'id_kotas' => 451,
                    'kondisi_rumah' => "Kontrak",
                    'ip' => 3.9,
                    'ipk' => 3.9,
                    'penghasilan_orangtua' => 500000,
                    'tanggungan_orangtua' => 1,
                    'periode_tahun' => "2022",
                    'periode_bulan' => "10",
                ]);
            }
        }
    }
}
