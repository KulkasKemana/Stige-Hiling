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

    // Relationships
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // ===== TAMBAHKAN DARI SINI =====
    
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function bookmarkedByUsers()
    {
        return $this->belongsToMany(User::class, 'bookmarks')
                    ->withTimestamps();
    }

    public function isBookmarkedBy($userId)
    {
        return $this->bookmarks()
                    ->where('user_id', $userId)
                    ->exists();
    }

    public function getBookmarkCountAttribute()
    {
        return $this->bookmarks()->count();
    }

    public function scopeBookmarkedBy($query, $userId)
    {
        return $query->whereHas('bookmarks', function($q) use ($userId) {
            $q->where('user_id', $userId);
        });
    }
    // ===== SAMPAI SINI =====

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}