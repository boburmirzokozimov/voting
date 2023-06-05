<?php

namespace Tests\Unit;

use App\Models\User;
use Facades\Tests\Setup\IdeaFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_be_admin(): void
    {
        $user = User::factory(['isAdmin' => true])->create();

        $this->assertTrue($user->isAdmin);
    }

}
