<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Juge>
 */
class JugeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => fake()->firstname(),
            'lastName' => fake()->lastname(),
            'email' => fake()->email(),
            'expertise' => fake()->text(),
        ];
    }
}
