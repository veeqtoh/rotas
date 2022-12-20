<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $genders = ['m','f'];
        return [
            'user_id' => rand(1,10),
            'first_name' => fake()->firstName(),
            'other_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'gender' => $genders[array_rand($genders)],
            'phone_1' => fake()->phoneNumber(),
        ];
    }
}
