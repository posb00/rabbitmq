<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'symbol' => $this->faker->unique()->lexify(),
            'open' => $this->faker->randomFloat(2),
            'high' => $this->faker->randomFloat(2),
            'low' => $this->faker->randomFloat(2),
            'close' => $this->faker->randomNumber(3,true),
        ];
    }
}