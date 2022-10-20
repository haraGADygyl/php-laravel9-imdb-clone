<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use willvincent\Rateable\Rateable;

class Movie extends Model
{
    use HasFactory, Searchable, Rateable;

    protected $fillable = [
        'name',
        'year',
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
            'actors' => $this->actors,
        ];
    }
}
