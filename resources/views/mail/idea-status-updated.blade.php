@component('mail::message')

    The Idea: {{$idea->title}} was updated to {{$idea->status->name}}
    @component('mail::button',['url' => route('ideas.show',$idea)])
        See
    @endcomponent

@endcomponent
