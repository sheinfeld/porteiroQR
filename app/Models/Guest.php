<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'name',
        'arrived_at',
    ];

    protected $casts = [
        'arrived_at' => 'datetime',
    ];
}
