<?php

namespace Tests\Unit;

use App\Models\Idea;
use App\Models\User;
use Tests\TestCase;

class IdeaTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_it_can_have_creator(): void
    {
        $this->withoutExceptionHandling();

        $idea = Idea::factory()->create();

        $this->assertInstanceOf(User::class, $idea->creator);
    }
}
