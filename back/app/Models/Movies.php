<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/***
 * Command to create (-m with migration)
 *
 * php artisan make:model Movies -m
 *
 */

class Movies extends Model
{
    use HasFactory;

    protected $table = 'tb_movies';

    protected $fillable = [
        'title',
        'genre',
        'year',
        'rating'
    ];

    // relationships
    public function actors()
    {
        return $this->belongsToMany(Actors::class, 'tb_movie_actor', 'movie_id', 'actor_id');
    }
}
