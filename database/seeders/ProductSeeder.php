<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $categories = Category::all()->pluck('id')->toArray();

        foreach (range(1, 20) as $index) {
            Product::create([
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 10, 100),
                'category_id' => $faker->randomElement($categories),
            ]);
        }
    }
}
