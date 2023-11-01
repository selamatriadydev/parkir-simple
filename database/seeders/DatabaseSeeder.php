<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'is_admin' => 1,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'petugas masuk',
            'username' => 'petugas_masuk',
            'email' => 'petugas_masuk@example.com',
            'password' => Hash::make('petugas'),
            'posisi_parkir' => '1',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'petugas keluar',
            'username' => 'petugas_keluar',
            'email' => 'petugas_keluar@example.com',
            'password' => Hash::make('petugas'),
            'posisi_parkir' => '2',
        ]);
    }
}

