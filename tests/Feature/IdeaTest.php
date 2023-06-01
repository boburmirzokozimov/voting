<?php

namespace Tests\Feature;

use App\Models\Idea;
use Facades\Tests\Setup\IdeaFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IdeaTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_create_an_idea()
    {
        $idea = Idea::factory()->raw(['user_id' => '']);

        $this->post('/ideas', $idea)
            ->assertRedirect('/login');
    }

    public function test_guests_cannot_vote_an_idea()
    {
        $idea = IdeaFactory::create();

        $this->get($idea->path() . '/votes')
            ->assertRedirect('/login');
    }

    public function test_an_idea_requires_a_title(): void
    {
        $user = $this->signIn();

        $idea = Idea::factory()->raw(['title' => '', 'user_id' => $user->id]);

        $this->post('/ideas', $idea)->assertSessionMissing('title');
        $this->assertDatabaseMissing('ideas', $idea);
    }

    public function test_an_idea_requires_a_description(): void
    {
        $user = $this->signIn();

        $idea = Idea::factory()->raw(['description' => '', 'user_id' => $user->id]);

        $this->post('/idea', $idea)->assertSessionMissing('description');

        $this->assertDatabaseMissing('ideas', $idea);
    }

    public function test_an_authenticated_user_can_create_an_idea(): void
    {
        $this->withoutExceptionHandling();

        $user = $this->signIn();

        $idea = Idea::factory()->raw(['user_id' => $user->id]);

        $this->post('/ideas', $idea);

        $this->assertDatabaseHas('ideas', $idea);
    }

    public function test_an_authenticated_user_cannot_update_other_ideas(): void
    {
        $idea = IdeaFactory::create();

        $this->actingAs($this->signIn())
            ->patch($idea->path(), ['title' => 'New Title From Another User']);

        $this->assertDatabaseHas('ideas', $idea->toArray());
        $this->assertDatabaseMissing('ideas', ['title' => 'New Title From Another User']);
    }

    public function test_an_authenticated_user_cannot_delete_other_ideas(): void
    {
        $idea = IdeaFactory::create();

        $this->actingAs($this->signIn())
            ->delete($idea->path());

        $this->assertDatabaseHas('ideas', $idea->toArray());
    }

    public function test_an_owner_can_update_the_idea(): void
    {
        $idea = IdeaFactory::create();

        $this->actingAs($idea->user)
            ->patch($idea->path(), ['title' => 'Changed']);

        $this->assertDatabaseHas('ideas', ['title' => 'Changed']);
    }

    public function test_an_owner_can_delete_the_idea(): void
    {
        $this->withoutExceptionHandling();

        $idea = IdeaFactory::create();

        $this->actingAs($idea->user)
            ->delete($idea->path());

        $this->assertModelMissing($idea);
    }

    public function test_a_user_can_see_the_idea(): void
    {
        $this->signIn();

        $idea = IdeaFactory::create();

        $this->get($idea->path())
            ->assertSee($idea->title)
            ->assertSee($idea->description);
    }

    public function test_a_user_can_vote_for_an_idea(): void
    {
        $this->withoutExceptionHandling();
        $user = $this->signIn();

        $idea = IdeaFactory::create();

        $this->get($idea->path() . '/votes');

        $this->assertDatabaseHas('user_vote', ["idea_id" => $idea->id,
            "user_id" => $user->id]);
    }
}
