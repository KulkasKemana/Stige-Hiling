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
        'image',
        'price',
        'location',
        'duration',
        'category',
        'status',
        'features'
    ];
    
    protected $casts = [
        'price' => 'decimal:2',
        'features' => 'array'
    ];
    
    /**
     * Get cart items for this destination
     */
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
    
    /**
     * Scope for active destinations
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    
    /**
     * Scope for specific category
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
    
    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}