<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLayer extends Model
{
    protected $fillable = ['name'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}

