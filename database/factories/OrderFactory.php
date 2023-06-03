<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{

    public function definition()
    {
        return [
            'customer_id' => fake()->randomElement(Customer::all()->pluck('id')),
            'city' => fake()->city,
        ];
    }
}
