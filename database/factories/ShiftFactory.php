<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\shift>
 */
class ShiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $descriptions = ['Arrival at parking site', 'Departure to Tilbury', 'Arrive at Tilbury site'];
        return [
            'rota_id' => 1,
            'driver_id' => rand(1,10),
            'van_id' => rand(1,10),
            'start_time' => now(),
            'end_time' => now()->addHours(2),
            'description' => $descriptions[array_rand($descriptions)],
        ];
    }
}
