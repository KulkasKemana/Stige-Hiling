<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'destination_id',
    ];

    /**
     * Get the user that owns the bookmark
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the destination that is bookmarked
     */
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}