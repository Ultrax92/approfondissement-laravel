<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On crée un utilisateur
        $user = \App\Models\User::factory()->create([
            'name' => 'Utilisateur Test',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        // On lui attache des settings
        \App\Models\Settings::create([
            'user_id' => $user->id,
            'theme' => 'light',
            'lang' => 'fr',
        ]);
    }
}
