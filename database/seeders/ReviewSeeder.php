<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $review1 = new Review();
        $review1->product_id = "1";
        $review1->customer_id = "ADE";
        $review1->rating = 5;
        $review1->comment = "Bagus Banget";
        $review1->save();

        $review2 = new Review();
        $review2->product_id = "2";
        $review2->customer_id = "ADE";
        $review2->rating = 3;
        $review2->comment = "Lumayan";
        $review2->save();
    }
}
