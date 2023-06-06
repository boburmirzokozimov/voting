<?php

namespace App\Http\Controllers\Idea;

use App\Http\Controllers\Controller;
use App\Http\Requests\Idea\CreateRequest;
use App\Http\Requests\Idea\UpdateRequest;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use Symfony\Component\HttpFoundation\Request;

class IdeaController extends Controller
{
    public function index(Request $request)
    {
        $statuses = Status::all()->pluck('id', 'name');
        $categories = Category::all()->pluck('id', 'name');

        return view('ideas.index', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->when($request->get('q') && $request->get('q') !== 'Open', function ($query) use ($statuses) {
                    return $query->where('status_id', $statuses[request()->query('q')]);
                })
                ->when($request->get('category') && $request->get('category') !== 'All Categories', function ($query) use ($categories) {
                    return $query->where('category_id', $categories[request()->query('category')]);
                })
                ->when($request->get('other_filter') && $request->get('other_filter') == 'top', function ($query) {
                    return $query->orderBy('votes_count', 'desc');
                })
                ->when($request->get('other_filter') && $request->get('other_filter') == 'me', function ($query) {
                    return $query->where('user_id', auth()->id());
                })
                ->when($request->get('search') && $request->get('search') !== '', function ($query) {
                    return $query->where('title', 'like', '%' . request()->query('search') . '%')
                        ->orWhere('description', 'like', '%' . request()->query('search') . '%');
                })
                ->withCount('votes')
                ->latest()
                ->paginate(5),


            'statuses' => Status::all(),
            'categories' => Category::all(),
        ]);
    }

    public function store(CreateRequest $request)
    {
        auth()->user()->createIdea($request->validated());

        return back()->with('success', 'Created a new idea');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea,
            'statuses' => Status::all(),
            'categories' => Category::all(),
            'comments' => $idea->comments()->paginate(10),
            'status_count' => Status::getCount(),
            'backUrl' => url()->previous() !== url()->full()
                ? url()->previous()
                : route('ideas')
        ]);
    }

    public function edit(Idea $idea)
    {
        return view('ideas.edit', compact($idea));
    }

    public function update(UpdateRequest $request, Idea $idea)
    {
        return redirect($request->persist()->path());
    }

    public function destroy(Idea $idea)
    {
        $this->authorize('manage', $idea);

        $idea->delete();

        return redirect('ideas')->with('success', 'Successfully deleted');
    }
}
