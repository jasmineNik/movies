<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['name','link'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }}
