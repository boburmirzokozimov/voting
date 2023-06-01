<div x-data="{ isOpen : false }"
     class="mt-6 relative flex justify-between">
    <div class="w-1/2 flex justify-between">
        <button @click="isOpen = !isOpen"
                class="btn-blue mr-4">Reply
        </button>
        <button class="btn">Set Status</button>
        <div x-cloak
             x-show="isOpen"
             class="card absolute w-1/3 top-[50%] left-[10%] text-left bg-white  py-3 px-2 rounded-xl flex items-center flex-col">
            <form action="{{$idea->path()}}" method="post" class="p-4 w-full">
                @csrf
                <textarea
                    class="w-full text-gray-900 rounded-xl border-none px-4 py-2 bg-gray-100"
                    name="text"
                    id="text"
                    cols="20"
                    rows="5"
                ></textarea>
                <input type="hidden" name="user_id" value="{{auth()->id()}}">
                <div
                    class="flex justify-between items-center w-full align-middle mt-2">
                    <button type="submit" class="btn-blue mr-4">Post</button>
                    <button class="btn "><i class="fa-solid fa-paperclip mr-1"></i>Attach</button>
                </div>
            </form>
        </div>
    </div>
    <div class="w-full flex justify-end items-center">
        <span class="mr-4 bg-white px-4 py-2 rounded-3xl flex flex-col items-center">
            <span class="font-bold text-xl">
                1
            </span>
            <span class="text-gray-400">
                votes
            </span>
        </span>
        <button class="btn-blue">
            Voted
        </button>
    </div>
</div>
