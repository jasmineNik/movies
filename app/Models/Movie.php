<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description',
        'poster', 'views', 'price', 'date'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopeId($query, $id)
    {
        return $query->where('id', $id);
    }
}
