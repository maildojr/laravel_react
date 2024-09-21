<?

namespace Database\Factories;

use App\Models\Actors;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class MoviesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Actors::class;

    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'name' => $faker->name,
            'birth' => $faker->date(),
            'country' => $faker->country
        ];
    }
}
