<?php

namespace Database\Seeders;

use App\Models\Atribut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtributSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
