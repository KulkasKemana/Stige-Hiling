<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
        'location',
        'image',
        'rating',
        'category'
    ];

    protected $casts = [
        'price' => 'integer',
        'rating' => 'decimal:1'
    ];
}