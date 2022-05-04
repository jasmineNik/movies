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

    public function stufts()
    {
        return $this->belongsToMany(Stuft::class);
    }
    public function Roles()
    {
        return $this->belongsToMany(Role::class);

    }
    public function languages()
    {
        return $this->belongsToMany(Language::class);

    }
    public function players()
    {
        return $this->belongsToMany(Player::class);
    }
    public function countres()
    {
        return $this->belongsToMany(Country::class);
    }
    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }
    public function comments()
    {
        return $this->belongsToMany(comment::class);
    }
    public function ratings()
    {
        return $this->belongsToMany(Rating::class);
    }
    public function ages()
    {
        return $this->belongsToMany(Age::class);
    }
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
