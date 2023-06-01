<?php

namespace App\Traits;

use App\Models\User;

trait Votable
{
    public function toggleVote(User $user): void
    {
        if ($this->isVoted($user)) {
            $this->votes()->detach($user);
        } else {
            $this->votes()->attach($user);
        }
    }

    public function isVoted(User $user): bool
    {
        return $this->votes->contains($user);
    }
}
