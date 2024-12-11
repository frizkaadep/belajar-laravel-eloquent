<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createCommentsForProduct();
        $this->createCommentsForVoucher();
    }

    public function createCommentsForProduct(): void
    {
        $product = Product::find("1");

        $comment1 = new Comment();
        $comment1->email = "ade@pzn.com";
        $comment1->title = "Title";
        $comment1->comment = "Comment Product";
        $comment1->commentable_id = $product->id;
        $comment1->commentable_type = Product::class;
        $comment1->save();
    }

    public function createCommentsForVoucher(): void
    {
        $voucher = Voucher::query()->first();

        $comment1 = new Comment();
        $comment1->email = "ade@pzn.com";
        $comment1->title = "Title";
        $comment1->comment = "Comment Voucher";
        $comment1->commentable_id = $voucher->id;
        $comment1->commentable_type = Voucher::class;
        $comment1->save();
    }
}
