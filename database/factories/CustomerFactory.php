<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CustomerFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => fake()->name ,
            'phone' => fake()->phoneNumber ,
            'address' =>fake()->address ,
        ];
    }
}
