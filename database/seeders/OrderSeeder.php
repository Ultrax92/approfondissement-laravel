<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::where('email', 'test@example.com')->first();
    
        if ($user) {
            $user->orders()->create([
                'amount' => 50,
                'status' => 'paid',
            ]);
        }
    }
}
