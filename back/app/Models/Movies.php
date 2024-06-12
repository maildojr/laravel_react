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
}
