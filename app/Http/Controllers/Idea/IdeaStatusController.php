<?php

namespace App\Http\Controllers\Idea;

use App\Http\Controllers\Controller;
use App\Http\Requests\Idea\Status\UpdateRequest;
use App\Models\Idea;

class IdeaStatusController extends Controller
{
    public function update(UpdateRequest $request, Idea $idea)
    {
        $idea->update(['status_id' => $request->validated('status_id')]);

        if ($request->validated('notify')) {
            $idea->notify();
        }

        $idea->save();

        return redirect($idea->path());
    }
}
