<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => "Ноутбук ". $this->faker->name,
            'article' => $this->faker->randomNumber(8),
            'price' => $this->faker->randomFloat(2, 10000, 100000),
            'description' => $this->faker->boolean ? $this->faker->text : null,
            'user_id' => 1
        ];
    }
}
