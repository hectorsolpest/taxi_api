<?php

namespace Database\Factories;

use App\Models\Journey;
use App\Models\Taxi;
use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Journey>
 */
class JourneyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'origin' => $this->faker->address,
            'destiny' => $this->faker->address,
            'taxi_id' => function () {
                return Taxi::all()->random()->id;
            },
            'start_datetime' => $this->faker->dateTimeBetween('now')->format('Y-m-d H:i:s'),
            'end_datetime' => $this->faker->dateTimeBetween('now')->modify('+1 hour')->format('Y-m-d H:i:s'),
        ];
    }
}
