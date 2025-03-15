<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('vi_VN'); // Đảm bảo Faker sử dụng tiếng Việt

        // Lặp qua 20 sản phẩm và tạo chúng
        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'name' => $faker->sentence(3), // Tạo tên sản phẩm bằng 3 từ ngẫu nhiên
                'description' => $faker->text(200), // Tạo mô tả sản phẩm
                'price' => $faker->randomFloat(2, 100, 1000), // Giá sản phẩm ngẫu nhiên từ 100 đến 1000
                'quantity' => $faker->numberBetween(1, 100), // Số lượng ngẫu nhiên từ 1 đến 100
                'is_active' => $faker->boolean, // Trạng thái sản phẩm ngẫu nhiên
                'category_id' => $faker->numberBetween(1, 5), // Giả sử có 5 danh mục sản phẩm
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
