<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'creator',
        'url',
        'description',
        'fav_image',
        'rating',
        'isMember',
        'isNSFW',
        'isPrivate'
    ];
}
