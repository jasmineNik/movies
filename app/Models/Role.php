<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }

    public function stufs()
    {
        return $this->belongsToMany(Role::class);
    }
}
