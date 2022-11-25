<?php

namespace Database\Factories;

use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\van>
 */
class VanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new Fakecar($faker));

        $vehicle = $faker->vehicleArray;

        return [
            'brand' => $vehicle['brand'],
            'model' => $vehicle['model'],
            'year' => $faker->year(),
            'reg' => $faker->vehicleRegistration(),
        ];
    }
}
