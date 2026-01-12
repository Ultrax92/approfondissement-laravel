<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // Clé étrangère vers la table users + contrainte unique (One-to-One)
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete(); // Si on supprime le user, on supprime ses settings

            $table->string('theme'); // pour stocker "light" ou "dark"
            $table->string('lang');  // pour stocker "fr" ou "en"

            $table->timestamps();

            // Sécurité supplémentaire pour garantir le One-to-One
            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
