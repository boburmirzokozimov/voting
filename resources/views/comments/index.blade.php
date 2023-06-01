@include('comments.create')
<div class="mb-6 w-10/12 ml-auto relative comments-container">
    <div class=" relative">
        @forelse($idea->comments as $comment)
            @include('comments.show')
        @empty
            <div class="card px-6 py-4 text-center text-gray-400">
                <h3 class="text-2xl">No comments,yet</h3>
            </div>
        @endforelse
    </div>
</div>
