<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'destination_id',
        'booking_code',
        'name',
        'email',
        'phone',
        'address',
        'travel_date',
        'quantity',
        'total_price',
        'payment_method',
        'payment_proof',
        'payment_status',
        'notes',
    ];

    protected $casts = [
        'travel_date' => 'date',
    ];

    // Relationship dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship dengan Destination
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}