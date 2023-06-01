<?php

namespace Tests\Setup;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;

class IdeaFactory
{
    protected ?User $user;
    protected ?Category $category = null;
    protected ?int $commentsCount = null;
    protected ?int $votesCount = null;

    public function ownedBy(?User $user = null): self
    {
        $this->user = $user;
        return $this;
    }

    public function withCategory(Category $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function withVotes(int $votesCount = null): self
    {
        $this->votesCount = $votesCount;
        return $this;
    }

    public function withComments(int $commentsCount = null): self
    {
        $this->commentsCount = $commentsCount;
        return $this;
    }

    public function create(): Idea
    {
        $idea = Idea::factory()->create(
            [
                'user_id' => $this->user ?? User::factory(),
                'category_id' => $this->category ?? Category::factory()
            ]
        );

        if ($this->commentsCount) {
            Comment::factory(count: $this->commentsCount)->create([
                'idea_id' => $idea->id
            ]);
        }

        if ($this->votesCount) {
            for ($i = 0; $i < $this->votesCount; $i++) {
                $idea->votes()->attach(User::factory()->create());
            }
        }
        return $idea;
    }
}
