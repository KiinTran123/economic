<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = DB::table('categories')->get();

        $products = [
            'Rau Củ' => [
                ['Cải ngọt', 'Cải ngọt tươi ngon', 20000, 100, 'rau-cu/cai-ngot.jpg'],
                ['Cà rốt', 'Cà rốt tươi sạch', 15000, 50, 'rau-cu/ca-rot.jpg'],
                ['Rau muống', 'Rau muống tươi ngon', 10000, 30, 'rau-cu/rau-muong.jpg'],
            ],
            'Thịt' => [
                ['Thịt bò', 'Thịt bò tươi ngon', 200000, 20, 'thit/thit-bo.jpg'],
                ['Thịt heo', 'Thịt heo tươi ngon', 100000, 40, 'thit/thit-heo.jpg'],
                ['Gà ta', 'Gà ta tươi ngon', 120000, 60, 'thit/ga-ta.jpg'],
            ],
            'Cá' => [
                ['Cá hồi', 'Cá hồi tươi ngon', 300000, 10, 'ca/ca-hoi.jpg'],
                ['Cá chép', 'Cá chép tươi ngon', 50000, 50, 'ca/ca-chep.jpg'],
                ['Cá basa', 'Cá basa tươi ngon', 60000, 30, 'ca/ca-basa.jpg'],
            ],
            'Trái cây' => [
                ['Dưa hấu', 'Dưa hấu tươi ngon', 20000, 100, 'trai-cay/dua-hau.jpg'],
                ['Xoài', 'Xoài tươi ngon', 30000, 60, 'trai-cay/xoai.jpg'],
                ['Táo', 'Táo tươi ngon', 50000, 40, 'trai-cay/tao.jpg'],
            ]
        ];

        foreach ($categories as $category) {
            foreach ($products[$category->name] ?? [] as $product) {
                DB::table('products')->insert([
                    'name' => $product[0],
                    'description' => $product[1],
                    'price' => $product[2],
                    'quantity' => $product[3],
                    'category_id' => $category->id,
                    'images' => $product[4],
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
