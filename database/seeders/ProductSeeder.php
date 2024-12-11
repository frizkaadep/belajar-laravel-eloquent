<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = new Product();
        $product1->id = "1";
        $product1->name = "Product 1";
        $product1->description = "Description 1";
        $product1->category_id = "FOOD";
        $product1->save();

        $product2 = new Product();
        $product2->id = "2";
        $product2->name = "Product 2";
        $product2->description = "Description 2";
        $product2->category_id = "FOOD";
        $product2->price = 200;
        $product2->save();
    }
}
