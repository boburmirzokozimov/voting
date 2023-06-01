<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use Facades\Tests\Setup\IdeaFactory;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_it_can_belong_to_idea(): void
    {
        $comment = Comment::factory()->create();

        $this->assertInstanceOf(Idea::class, $comment->idea);
    }

    public function test_it_can_belong_to_a_user(): void
    {
        $comment = Comment::factory()->create();

        $this->assertInstanceOf(User::class, $comment->user);
    }
}
