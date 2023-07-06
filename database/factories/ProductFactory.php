<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition(): array
    {
        $user = User::where('type','seller')->inRandomOrder()->first();
        return [
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(5),
            'price' => fake()->randomFloat(2, 0, 500, 000),
            'state' => fake()->randomElement(['private', 'visible']),

            'user_id'=>$user,
            'category_id'=>Category::all()->random()->id,
        ];
    }
}
