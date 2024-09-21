<?php

namespace Database\Seeders;

use App\Models\Actors;
use App\Models\Movies;
use Illuminate\Database\Seeder;


class ActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Actors::factory()->count(20)->create();
        $actors = [
            [ 'name' => "Meryl Streep", 'birth' => "1949-06-22", 'country' => "United States" ],
            [ 'name' => "Leonardo DiCaprio", 'birth' => "1974-11-11", 'country' => "United States" ],
            [ 'name' => "Cate Blanchett", 'birth' => "1969-05-14", 'country' => "Australia" ],
            [ 'name' => "Daniel Day-Lewis", 'birth' => "1957-04-29", 'country' => "United Kingdom" ],
            [ 'name' => "Penélope Cruz", 'birth' => "1974-04-28", 'country' => "Spain" ],
            [ 'name' => "Javier Bardem", 'birth' => "1969-03-01", 'country' => "Spain" ],
            [ 'name' => "Tilda Swinton", 'birth' => "1960-11-05", 'country' => "United Kingdom" ],
            [ 'name' => "Denzel Washington", 'birth' => "1954-12-28", 'country' => "United States" ],
            [ 'name' => "Nicole Kidman", 'birth' => "1967-06-20", 'country' => "Australia" ],
            [ 'name' => "Idris Elba", 'birth' => "1972-09-06", 'country' => "United Kingdom" ],
            [ 'name' => "Marion Cotillard", 'birth' => "1975-09-30", 'country' => "France" ],
            [ 'name' => "Robert Downey Jr.", 'birth' => "1965-04-04", 'country' => "United States" ],
            [ 'name' => "Natalie Portman", 'birth' => "1981-06-09", 'country' => "Israel/United States" ],
            [ 'name' => "Gary Oldman", 'birth' => "1958-03-21", 'country' => "United Kingdom" ],
            [ 'name' => "Angela Bassett", 'birth' => "1958-08-16", 'country' => "United States"],
        ];
        Actors::insert($actors);

        // Insert relationship with movies
        Movies::find(1)->actors()->attach([1, 2, 3, 4]);
        Movies::find(2)->actors()->attach([5, 6]);
        Movies::find(4)->actors()->attach([2, 7]);
    }
}
