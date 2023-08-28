<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory
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
            'appointment' => $this->faker->date($format = 'Y-m-d', $min = 'now'),
            'city' => $this->faker->randomElement(['Coimbatore', 'Chennai','Bangalore','Hyderabad']),
            "address" => $this ->faker->address(),
            "created_at" => now()
        ];
    }
}
