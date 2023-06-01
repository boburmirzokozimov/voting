<x-app-layout>
    @include('ideas.search')
    
    <div class="ideas-container mt-8">
        @foreach($ideas as $idea)
            @include('ideas._idea')
        @endforeach
    </div>
</x-app-layout>
