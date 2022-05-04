<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    protected $fillable = ['number'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
    
}
