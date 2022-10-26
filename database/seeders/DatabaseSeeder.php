<?php

namespace Database\Seeders;

use App\Models\Atribut;
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
    }
}
