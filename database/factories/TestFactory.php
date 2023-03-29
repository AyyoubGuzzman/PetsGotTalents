<?php

namespace Database\Factories;

use App\Models\Juge;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jugeID' =>rand(1,Juge::count()),
            'animalID' =>rand(1,Animal::count()),
            'score' => fake()->numberBetween(10, 100),
        ];
    }
}
