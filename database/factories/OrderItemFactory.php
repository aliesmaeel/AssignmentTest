<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItems>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id'=>fake()->randomElement(Order::all()->pluck('id')),
            'product_id'=>fake()->randomElement(Product::all()->pluck('id')),
            'quantity'=>fake()->numberBetween(1,20)
        ];
    }
}
