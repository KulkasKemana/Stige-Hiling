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
        'booking_date'
    ];
    
    protected $casts = [
        'booking_date' => 'date'
    ];
    
    /**
     * Get the user that owns the cart item
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the destination for this cart item
     */
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    
    /**
     * Get total price for this cart item
     */
    public function getTotalPriceAttribute()
    {
        return $this->destination->price * $this->quantity;
    }
}