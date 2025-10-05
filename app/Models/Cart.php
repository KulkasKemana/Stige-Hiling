<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'destination_id',
        'quantity',
        'price',
        'total_price',
        'booking_date',
        'status'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'integer',
        'total_price' => 'integer',
        'booking_date' => 'date'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($cart) {
            if ($cart->destination) {
                $cart->price = $cart->destination->price;
            }
            $cart->total_price = $cart->price * $cart->quantity;
        });
    }

    // relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    // scopes
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
