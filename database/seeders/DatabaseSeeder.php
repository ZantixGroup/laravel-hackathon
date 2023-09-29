<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'asd@asd.com',
            'password' => Hash::make('admin123'),
            'level' => 0,
            'points' => 0,
         ]);

        User::create([
            'name' => 'Renārs',
            'surname' => 'Gausiņš',
            'email' => 'renars.gausins@zantix.net',
            'password' => Hash::make('qwerty'),
            'level' => 0,
            'points' => 0,
        ]);

        User::create([
            'name' => 'Alberts',
            'surname' => 'Liepiņš',
            'email' => 'liepins01@gmail.com',
            'password' => Hash::make('Password1#'),
            'level' => 0,
            'points' => 0,
        ]);

        User::create([
            'name' => 'Dimitrijs',
            'surname' => 'Semjonovs',
            'email' => 'asd3@asd.com',
            'password' => Hash::make('admin123'),
            'level' => 0,
            'points' => 0,
        ]);

        User::create([
            'name' => 'Miks',
            'surname' => 'Mednis',
            'email' => 'asd4@asd.com',
            'password' => Hash::make('admin123'),
            'level' => 0,
            'points' => 0,
        ]);
    }
}
