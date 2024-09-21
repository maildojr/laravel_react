<?

namespace Database\Factories;

use App\Models\Movies;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use \Xylis\FakerCinema\Provider\Movie as FakerMovie;

class MoviesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movies::class;

    public function definition(): array
    {
        $faker = Faker::create();
        $faker->addProvider(new FakerMovie($faker));
        return [
            'title' => $faker->movie,
            'genre' => $faker->movieGenre,
            'description' => $faker->overview,
            'release_year' => $faker->year,
            'tmdb_id' => $faker->tmdbId
        ];
    }
}
