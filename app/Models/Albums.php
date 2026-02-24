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
    public function likes()
    {
        return $this->hasMany(Likes::class, 'album_id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'album_id');
    }

    public function likedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}
