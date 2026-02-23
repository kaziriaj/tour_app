<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $fillable = [
        'user_id',
        'album_title',
        'album_description',
        'album_cover',
        'album_slug',
        'is_public',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
