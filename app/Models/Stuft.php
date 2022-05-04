<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuft extends Model
{
    protected $fillable = ['name','surname','image','b-day','d-day'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
