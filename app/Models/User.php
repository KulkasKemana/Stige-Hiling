<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ===== TAMBAHKAN DARI SINI =====
    
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function bookmarkedDestinations()
    {
        return $this->belongsToMany(Destination::class, 'bookmarks')
                    ->withTimestamps();
    }

    public function hasBookmarked($destinationId)
    {
        return $this->bookmarks()
                    ->where('destination_id', $destinationId)
                    ->exists();
    }

    public function toggleBookmark($destinationId)
    {
        $bookmark = $this->bookmarks()
                         ->where('destination_id', $destinationId)
                         ->first();

        if ($bookmark) {
            $bookmark->delete();
            return false;
        } else {
            $this->bookmarks()->create([
                'destination_id' => $destinationId
            ]);
            return true;
        }
    }
    // ===== SAMPAI SINI =====
}