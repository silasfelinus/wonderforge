<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wildcard extends Model
{
    public function tags()
{
    return $this->belongsToMany(Tag::class);
}
    use HasFactory;
}
