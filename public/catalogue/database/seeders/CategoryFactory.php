<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'category_id' => rand(1, 5), PAS BON CAR S'INCREMENTE TOUT SEUL
            'name' => $this->faker->unique()->word // A single unique word
        ];
    }
}