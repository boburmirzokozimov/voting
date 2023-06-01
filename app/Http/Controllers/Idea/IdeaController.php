<?php

namespace App\Http\Controllers\Idea;

use App\Http\Controllers\Controller;
use App\Http\Requests\Idea\CreateRequest;
use App\Http\Requests\Idea\UpdateRequest;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function index()
    {
        return view('ideas.index', ['ideas' => Idea::query()->latest()->get()]);
    }

    public function store(CreateRequest $request)
    {
        auth()->user()->ideas()->create($request->validated());

        return back()->with('success', 'Created a new idea');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea
        ]);
    }

    public function edit(Idea $idea)
    {
        return view('ideas.edit', compact($idea));
    }

    public function update(UpdateRequest $request, Idea $idea)
    {
        return $request->persist()->path();
    }

    public function destroy(Idea $idea)
    {
        $this->authorize('manage', $idea);

        $idea->delete();

        return back()->with('success', 'Successfully deleted');
    }
}
