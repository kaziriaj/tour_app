<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo_gallery extends Model
{
    protected $fillable = [
        'album_id',
        'photo_title',
        'photo_description',
        'photo_path',
        'photo_slug',
        'is_public',
        'status',
    ];

    public function album()
    {
        return $this->belongsTo(Albums::class);
    }
}
