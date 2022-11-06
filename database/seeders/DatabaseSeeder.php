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

        $this->call([
            AtributSeeder::class,
            ProvinsiSeeder::class,
            KotaSeeder::class,
            PendaftarPenerimaBeasiswaSeeder::class,
        ]);

        
    }
}
