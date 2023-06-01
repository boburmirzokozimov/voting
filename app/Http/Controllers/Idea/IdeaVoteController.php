<?php

namespace App\Http\Controllers\Idea;

use App\Http\Controllers\Controller;
use App\Models\Idea;

class IdeaVoteController extends Controller
{
    public function vote(Idea $idea)
    {
        $idea->addVote(auth()->id());
        return back();
    }
}
