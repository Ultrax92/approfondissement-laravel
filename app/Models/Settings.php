<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme',
        'lang',
        'user_id'
    ];

    public function user()
    {
        // Ces réglages appartiennent à un utilisateur
        return $this->belongsTo(User::class);
    }
}
