<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\karyawan;
use App\Models\dataAbsensi;
use App\Models\shift;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'INET MEDIA',
            'email' => 'inetmedia@gmail.com',
            'password' => Hash::make('qwerty54321')
        ]);
        
    }
}
