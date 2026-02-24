<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected$fillable = [
        'photo_id',
        'user_id',
        'comment_text',
        'is_public',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function album()
    {
        return $this->belongsTo(Albums::class, 'album_id');
    }
}
