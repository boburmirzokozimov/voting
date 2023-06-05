<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Status;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app', [
            'categories' => Category::all(),
            'statuses' => Status::with('ideas')->get(),
            'status_count' => Status::getCount()
        ]);
    }
}
