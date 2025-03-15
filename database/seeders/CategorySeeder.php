<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Electronics', 'description' => 'Devices, gadgets, and electronics products'],
            ['name' => 'Fashion', 'description' => 'Clothing, accessories, and fashion items'],
            ['name' => 'Home Appliances', 'description' => 'Appliances for the home like fridges, ovens, etc.'],
            ['name' => 'Books', 'description' => 'Printed and digital books in various genres'],
            ['name' => 'Furniture', 'description' => 'Furniture for homes and offices'],
            ['name' => 'Sports', 'description' => 'Sporting goods and equipment for various sports'],
            ['name' => 'Beauty & Health', 'description' => 'Beauty products and health-related items'],
            ['name' => 'Toys', 'description' => 'Toys and games for children of all ages'],
            ['name' => 'Groceries', 'description' => 'Daily necessities and food items'],
            ['name' => 'Automotive', 'description' => 'Car accessories and auto parts'],
            ['name' => 'Pet Supplies', 'description' => 'Products for pets including food, toys, and care items'],
        ]);
    }
}
