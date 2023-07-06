<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('type', 'administrator')->inRandomOrder()->first();
        $product = Product::where('state', 'private')->inRandomOrder()->first();
        return [
            'notification'=>fake()->paragraph(),
            'user_id'=>$user,
            'product_id'=>$product,
        ];
    }
}
