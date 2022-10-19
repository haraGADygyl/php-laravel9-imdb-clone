<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Movie extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'year',
        'rating',
        'actors',
        'poster',
        'trailer_link',
        'genre_id',
        'user_id',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'year' => $this->year,
            'genre_id' => $this->genre_id,
            'rating' => $this->rating,
            'actors' => $this->actors,
        ];
    }
}
