<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Comment;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    public function testCreateComment()
    {
        $comment = new Comment();
        $comment->email = "ade@pzn.com";
        $comment->title = "Sample title";
        $comment->comment = "Sample comment";

        $comment->save();

        self::assertNotNull($comment->id);
    }

    public function testDefaultAttributeValues()
    {
        $comment = new Comment();
        $comment->email = "ade@pzn.com";

        $comment->save();

        self::assertNotNull($comment->id);
        self::assertNotNull($comment->title);
        self::assertNotNull($comment->comment);
    }
}
