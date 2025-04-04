<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Rau Củ', 'description' => 'Các loại rau xanh củ tươi'],
            ['name' => 'Thịt', 'description' => 'Các loại thịt tươi sống'],
            ['name' => 'Cá', 'description' => 'Các loại cá tươi'],
            ['name' => 'Trái cây', 'description' => 'Các loại trái cây tươi ngon'],
        ]);
    }
}
