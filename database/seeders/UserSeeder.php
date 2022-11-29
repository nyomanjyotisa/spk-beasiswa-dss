<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('123123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('123123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Admin 3',
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('123123'),
            'email_verified_at' => now(),
        ]);
    }
}
