<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
    use HasFactory;

    protected $table = 'tb_actors';

    protected $fillable = [
        'name',
        'birth',
        'country',
    ];

    // relationships
    public function movies()
    {
        return $this->belongsToMany(Movies::class, 'tb_movie_actor', 'actor_id', 'movie_id');
    }
}
