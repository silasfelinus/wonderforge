<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    // In Tag model
public function wildcards()
{
    return $this->belongsToMany(Wildcard::class);
}
    public function assets()
    {
        return $this->belongsToMany(Asset::class);
    }

}
