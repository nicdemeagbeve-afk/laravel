<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un utilisateur administrateur
        User::create([
            'name' => 'Admin',
            'email' => 'admin@garage.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Créer un utilisateur test
        User::create([
            'name' => 'Utilisateur Test',
            'email' => 'test@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('test123'),
            'role' => 'user',
        ]);
    }
}
