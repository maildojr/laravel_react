<?php

namespace Database\Seeders;

use App\Models\Movies;
use Illuminate\Database\Seeder;


class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Movies::factory()->count(20)->create();
        $movies = [
            ['title' => 'The Shawshank Redemption', 'genre' => 'Drama', 'year' => 1994, 'rating' => 9.3, 'tmdb_id' => 278],
            ['title' => 'The Godfather', 'genre' => 'Crime', 'year' => 1972, 'rating' => 9.2, 'tmdb_id' => 238],
            ['title' => 'The Dark Knight', 'genre' => 'Action', 'year' => 2008, 'rating' => 9.0, 'tmdb_id' => 155],
            ['title' => 'The Godfather: Part II', 'genre' => 'Crime', 'year' => 1974, 'rating' => 9.0, 'tmdb_id' => 240],
            ['title' => '12 Angry Men', 'genre' => 'Drama', 'year' => 1957, 'rating' => 8.9, 'tmdb_id' => 389],
            ['title' => 'Schindler\'s List', 'genre' => 'Biography', 'year' => 1993, 'rating' => 8.9, 'tmdb_id' => 424],
            ['title' => 'The Lord of the Rings: The Return of the King', 'genre' => 'Adventure', 'year' => 2003, 'rating' => 8.9, 'tmdb_id' => 122],
            ['title' => 'Pulp Fiction', 'genre' => 'Crime', 'year' => 1994, 'rating' => 8.9, 'tmdb_id' => 680],
            ['title' => 'The Good, the Bad and the Ugly', 'genre' => 'Western', 'year' => 1966, 'rating' => 8.8, 'tmdb_id' => 429],
            ['title' => 'Fight Club', 'genre' => 'Drama', 'year' => 1999, 'rating' => 8.8, 'tmdb_id' => 550],
            ['title' => 'Forrest Gump', 'genre' => 'Drama', 'year' => 1994, 'rating' => 8.8, 'tmdb_id' => 13],
            ['title' => 'Inception', 'genre' => 'Action', 'year' => 2010, 'rating' => 8.8, 'tmdb_id' => 27205],
            ['title' => 'The Lord of the Rings: The Fellowship of the Ring', 'genre' => 'Adventure', 'year' => 2001, 'rating' => 8.8, 'tmdb_id' => 120],
            ['title' => 'The Lord of the Rings: The Two Towers', 'genre' => 'Adventure', 'year' => 2002, 'rating' => 8.7, 'tmdb_id' => 121],
            ['title' => 'Star Wars: Episode V - The Empire Strikes Back', 'genre' => 'Action', 'year' => 1980, 'rating' => 8.7, 'tmdb_id' => 1891],
            ['title' => 'The Matrix', 'genre' => 'Action', 'year' => 1999, 'rating' => 8.7, 'tmdb_id' => 603],
            ['title' => 'Goodfellas', 'genre' => 'Biography', 'year' => 1990, 'rating' => 8.7, 'tmdb_id' => 769],
            ['title' => 'One Flew Over the Cuckoo\'s Nest', 'genre' => 'Drama', 'year' => 1975, 'rating' => 8.7, 'tmdb_id' => 510],
            ['title' => 'Seven Samurai', 'genre' => 'Adventure', 'year' => 1954, 'rating' => 8.6, 'tmdb_id' => 346],
            ['title' => 'Se7en', 'genre' => 'Crime', 'year' => 1995, 'rating' => 8.6, 'tmdb_id' => 807],
            ['title' => 'The Silence of the Lambs', 'genre' => 'Crime', 'year' => 1991, 'rating' => 8.6, 'tmdb_id' => 274],
            ['title' => 'City of God', 'genre' => 'Crime', 'year' => 2002, 'rating' => 8.6, 'tmdb_id' => 598],
            ['title' => 'It\'s a Wonderful Life', 'genre' => 'Drama', 'year' => 1946, 'rating' => 8.6, 'tmdb_id' => 1585],
            ['title' => 'Life Is Beautiful', 'genre' => 'Comedy', 'year' => 1997, 'rating' => 8.6, 'tmdb_id' => 637],
            ['title' => 'The Usual Suspects', 'genre' => 'Crime', 'year' => 1995, 'rating' => 8.5, 'tmdb_id' => 629],
            ['title' => 'Spirited Away', 'genre' => 'Animation', 'year' => 2001, 'rating' => 8.5, 'tmdb_id' => 129],
            ['title' => 'Saving Private Ryan', 'genre' => 'Drama', 'year' => 1998, 'rating' => 8.5, 'tmdb_id' => 857],
            ['title' => 'The Green Mile', 'genre' => 'Crime', 'year' => 1999, 'rating' => 8.5, 'tmdb_id' => 497],
            ['title' => 'Léon: The Professional', 'genre' => 'Crime', 'year' => 1994, 'rating' => 8.5, 'tmdb_id' => 101],
            ['title' => 'The Pianist', 'genre' => 'Biography', 'year' => 2002, 'rating' => 8.5, 'tmdb_id' => 423],
        ];
        Movies::insert($movies);
    }
}
