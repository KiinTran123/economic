<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 123123,
            'role' => 1,
            'is_active' => 1
        ]);

        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);

    }
}
