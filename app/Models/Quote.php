<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'quote',
        'received_at'
    ];

    protected $casts = [
        'received_at' => 'datetime'
    ];
} 