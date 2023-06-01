<?php

namespace App\Http\Controllers\Idea;

use App\Http\Controllers\Controller;
use App\Http\Requests\Idea\Comment\CreateRequest;
use App\Models\Idea;

class IdeaCommentController extends Controller
{
    public function store(CreateRequest $request, Idea $idea)
    {
        return redirect($request->persist()->path());
    }
}
