<?php

namespace Tests\Setup;

use App\Models\Idea;
use App\Models\User;

class IdeaFactory
{
    protected ?User $user;

    public function ownedBy(?User $user = null): self
    {
        $this->user = $user;
        return $this;
    }

    public function create(): Idea
    {
        return Idea::factory()->create(
            [
                'user_id' => $this->user ?? User::factory()
            ]
        );
    }
}
