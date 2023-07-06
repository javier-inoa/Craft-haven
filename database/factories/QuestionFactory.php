<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Node\Block\Paragraph;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $text=fake()->paragraph();
        return [
            'question'=>fake()->paragraph(),
            'answer'=>fake()->randomElement([$text,null]),

            'user_id'=>User::all()->random()->id,
            'product_id'=>Product::all()->random()->id,
        ];
    }
}
