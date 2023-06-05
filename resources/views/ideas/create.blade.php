<div>
    <div class="text-center px-6 py-2 pt-6">
        <h3 class="font-semibold text-base">Add an idea</h3>
        <p class="text-sm mt-4">Let us know what you would like and we will take a look over!</p>
    </div>
    <form class="space-y-4 px-4 py-6" action="{{route('ideas.store')}}" method="post">
        @csrf
        <div>
            <input type="text" name="title" id="title_add"
                   class="w-full text-gray-900 rounded-xl border-none px-4 py-2 bg-gray-100">
        </div>

        <div>
            <select wire:model.defer="category_id" name="category_id" id="category_add"
                    class="w-full text-sm text-gray-900 rounded-xl bg-gray-100 border-none px-4 py-2">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="status_id" value="1">
        <div>
                    <textarea type="text" name="description" id="description"
                              cols="30"
                              rows="3"
                              class="w-full text-gray-900 rounded-xl border-none px-4 py-2 bg-gray-100"></textarea>
        </div>

        <div class="flex justify-between">
            <button
                class="flex items-center justify-center w-1/2 mr-4 h11 text-sm rounded-xl bg-gray-200 py-4 hover:border-gray-400"
                type="button"><i class="fa-solid fa-paperclip mr-1"></i><span>Attach</span>
            </button>
            <button
                class="flex items-center justify-center w-1/2 h11 text-sm rounded-xl bg-blue-500 text-white py-4 hover:border-gray-400"
                type="submit">Submit
            </button>
        </div>
    </form>
</div>
