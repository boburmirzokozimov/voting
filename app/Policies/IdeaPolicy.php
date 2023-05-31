<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;

class IdeaPolicy
{
    public function manage(User $user, Idea $idea): bool
    {
        return $user->is($idea->creator);
    }

}
