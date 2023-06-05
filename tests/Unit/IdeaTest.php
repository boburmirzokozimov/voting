<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Status;
use App\Models\User;
use Facades\Tests\Setup\IdeaFactory;
use Tests\TestCase;

class IdeaTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_it_can_have_creator(): void
    {
        $idea = IdeaFactory::create();

        $this->assertInstanceOf(User::class, $idea->user);
    }

    public function test_it_can_have_category(): void
    {
        $idea = IdeaFactory::create();

        $this->assertInstanceOf(Category::class, $idea->category);
    }

    public function test_it_can_have_comments(): void
    {
        $idea = IdeaFactory::withComments(5)->create();

        $this->assertInstanceOf(Comment::class, $idea->comments->first());
    }

    public function test_it_can_have_votes(): void
    {
        $idea = IdeaFactory::withVotes(5)->create();

        $this->assertInstanceOf(User::class, $idea->votes->first());
    }

    public function test_it_can_have_status(): void
    {
        $idea = IdeaFactory::withVotes(5)->create();

        $this->assertInstanceOf(Status::class, $idea->status);
    }
}
