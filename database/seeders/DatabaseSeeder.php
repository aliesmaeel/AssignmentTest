<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::factory()->count(1)->create();
        Customer::factory()->count(10)->create();
        Order::factory()->count(10)->create();
        Product::factory()->count(10)->create();
        OrderItem::factory()->count(10)->create();
    }
}
