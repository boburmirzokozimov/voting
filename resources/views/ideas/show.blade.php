<x-app-layout>
    <div class="w-1/4 mb-6">
        <a class="px-4 bg-blue-500 rounded-xl text-white hover:bg-blue-600 p-2" href="{{$backUrl}}">
            All Ideas
        </a>
    </div>
    <div class="filters flex space-x-6 items-center">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full text-gray-900 rounded-xl border-none px-4 py-2">
                <option value="Category One">Category one</option>
                <option value="Category Two">Category two</option>
                <option value="Category Three">Category three</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="other_filters" id="other_filters"
                    class="w-full text-gray-900 rounded-xl border-none px-4 py-2">
                <option value="Category One">Other Filters</option>
                <option value="Category Two">Category two</option>
                <option value="Category Three">Category three</option>
            </select>
        </div>
        <div class="w-2/3 relative">
            <i class="fa-solid text-gray-400 fa-magnifying-glass absolute bottom-[12px] left-[15px]"></i>
            <input type="search" name="" class="placeholder-gray-900 w-full rounded-xl border-none px-10 py-2"
                   placeholder="Find "
                   id="search">
        </div>
    </div>

    <div class="ideas-container mt-8">
        @include('ideas._idea')
        @include('comments.index')
    </div>
</x-app-layout>
