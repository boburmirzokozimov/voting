@include('comments.create')
@if($comments->isNotEmpty())
    <div class="mb-6 w-10/12 ml-auto relative comments-container">
        <div class=" relative">
            @foreach($comments as $comment)
                @include('comments.show')
            @endforeach
        </div>

        <div class="my-4">
            {{$comments->render()}}
        </div>
    </div>
@endif
