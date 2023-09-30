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
            'name' => 'Andis',
            'surname' => 'Ābele',
            'email' => 'asd@asd.com',
            'password' => Hash::make('admin123'),
            's_level' => 1,
            't_level' => 2,
            'e_level' => 3,
            'm_level' => 4,
            'score' => 141,
            'avatar' => 2,
         ]);

        User::factory(100)->create();
    }
}
