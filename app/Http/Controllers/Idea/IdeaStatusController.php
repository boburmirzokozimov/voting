<?php

namespace App\Http\Controllers\Idea;

use App\Http\Controllers\Controller;
use App\Http\Requests\Idea\Status\UpdateRequest;
use App\Models\Idea;

class IdeaStatusController extends Controller
{
    public function update(UpdateRequest $request, Idea $idea)
    {
        $idea->update($request->validated());

        $idea->save();

        return redirect($idea->path());
    }
}
