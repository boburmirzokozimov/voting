<?php

namespace Tests\Feature;

use Facades\Tests\Setup\IdeaFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_create_a_comment()
    {
        $idea = IdeaFactory::create();

        $this->post($idea->path(), ['text' => 'New Comment'])
            ->assertRedirect('/login');
    }

    public function test_an_authenticated_user_can_create_comments(): void
    {
        $john = $this->signIn();
        $idea = IdeaFactory::create();

        $comment = [
            'text' => 'A new Comment for this given Idea',
            'user_id' => $john->id
        ];

        $this->actingAs($idea->user)
            ->post($idea->path(), $comment);

        $this->assertDatabaseHas('comments', $comment);
    }


}
