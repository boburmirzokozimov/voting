<x-app-layout>
    @include('ideas.search')

    <div class="ideas-container my-8">
        @foreach($ideas as $idea)
            @include('ideas._idea')
        @endforeach

    </div>
    <div class="mb-8">
        {{$ideas->links()}}
    </div>
</x-app-layout>
