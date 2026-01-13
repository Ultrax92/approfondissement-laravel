<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolymorphicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::where('email', 'test@example.com')->first();
    
        // CAS 1 : Une commande pour un PRODUIT PHYSIQUE
        $keyboard = \App\Models\ProductOrder::create([
            'name' => 'Clavier Mécanique',
            'price' => 100
        ]);
    
        \App\Models\Order::create([
            'user_id' => $user->id,
            'amount' => 100,
            'status' => 'paid',
            'orderable_id' => $keyboard->id,
            'orderable_type' => \App\Models\ProductOrder::class,
        ]);
    
        // CAS 2 : Une commande pour un ABONNEMENT
        $netflix = \App\Models\SubscriptionOrder::create([
            'name' => 'Streaming Mensuel',
            'price' => 15,
            'duration_months' => 1
        ]);
    
        \App\Models\Order::create([
            'user_id' => $user->id,
            'amount' => 15,
            'status' => 'pending',
            'orderable_id' => $netflix->id,
            'orderable_type' => \App\Models\SubscriptionOrder::class,
        ]);
    }
}
