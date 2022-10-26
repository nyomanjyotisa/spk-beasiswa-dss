<?php

namespace Database\Seeders;

use App\Models\Atribut;
use App\Models\Kota;
use App\Models\PendaftarBeasiswa;
use App\Models\PenerimaBeasiswa;
use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Atribut::create([
            'nama' => 'provinsi',
            'bobot' => 10,
        ]);

        Atribut::create([
            'nama' => 'kota',
            'bobot' => 10,
        ]);

        Atribut::create([
            'nama' => 'kondisi_rumah',
            'bobot' => 20,
        ]);

        Atribut::create([
            'nama' => 'ip',
            'bobot' => 10,
        ]);

        Atribut::create([
            'nama' => 'ipk',
            'bobot' => 20,
        ]);

        Atribut::create([
            'nama' => 'penghasilan_orangtua',
            'bobot' => 20,
        ]);

        Atribut::create([
            'nama' => 'tanggungan_orangtua',
            'bobot' => 10,
        ]);

        Provinsi::create([
            'provinsi' => "Bali",
        ]);

        Kota::create([
            'id_provinsis' => "1",
            'kotas' => "Gianyar",
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
                    'penghasilan_orangtua' => 2000000,
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
                    'penghasilan_orangtua' => 2000000,
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
                    'penghasilan_orangtua' => 2000000,
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
                    'id_provinsis' => 1,
                    'id_kotas' => 1,
                    'kondisi_rumah' => "Milik Sendiri",
                    'ip' => 3.5,
                    'ipk' => 3.6,
                    'penghasilan_orangtua' => 2000000,
                    'tanggungan_orangtua' => 5,
                    'nilai_perhitungan' => 80 + $i,
                    'periode_tahun' => "2022",
                    'periode_bulan' => "10",
                ]);
            }
        }
    }
}
