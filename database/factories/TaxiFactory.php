<?php

namespace Database\Factories;

use App\Models\Base;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Taxi>
 */
class TaxiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plate_number'=>$this->faker->bothify('???-????'),
            'year'=>$this->faker->year(['min' => 2010, 'max' => 2020]),
            'brand_id'=>Brand::factory(),
            'base_id'=>Base::factory(),
        ];
    }
}
