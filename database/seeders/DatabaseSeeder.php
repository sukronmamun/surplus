<?php

namespace Database\Seeders;


use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Image;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(5)->create();
        Category::factory(5)->create();
        Image::factory(5)->create();

        Product::all()->each(function($product) {
            for ($i=1; $i < rand(2, 5); $i++) { 
                CategoryProduct::factory(1)->create([
                    'product_id' => $product->id,
                    'category_id' => $i,
                ]);    
            }

            for ($i=1; $i < rand(2, 5); $i++) { 
                ImageProduct::factory(1)->create([
                    'product_id' => $product->id,
                    'image_id' => $i,
                ]);    
            }
        });
    }
}
