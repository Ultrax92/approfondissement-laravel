<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'status',
        'orderable_id',
        'orderable_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderable()
    {
        return $this->morphTo();
    }
}
