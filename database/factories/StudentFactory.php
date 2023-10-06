<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "email" => $this->faker->unique()->safeEmail(),
            'skills' => $this->faker->randomElement(['c++', 'java', 'python', 'javascript']),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'appointment' => $this->faker->dateTimeBetween('now', '+30 days')->format('Y-m-d'),
            'city_id' => $this->faker->randomElement(['1', '2','3','4']),
            "address" => $this ->faker->address(),
            "created_at" => now()
        ];
    }
}