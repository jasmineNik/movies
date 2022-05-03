<?php

namespace App\Models;

use BaconQrCode\Renderer\Path\Move;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['text'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
       
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
       
    }
}
