<?php

namespace Tests\Feature;

use App\Models\User;
use Facades\Tests\Setup\IdeaFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_change_and_see_set_status(): void
    {
        $admin = User::factory(['isAdmin' => true])->create();

        $idea = IdeaFactory::create();

        $this->actingAs($admin)
            ->get($idea->path())
            ->assertSee('Set Status');

        $this->actingAs($this->signIn())
            ->get($idea->path())
            ->assertDontSee('Set Status');
    }

}
