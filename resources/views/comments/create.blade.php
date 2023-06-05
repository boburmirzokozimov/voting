<div x-data="
{
    isOpen : false,
    isOpenRadio: false
 }"
     class="mt-6 relative flex justify-between">
    <div class="w-1/2 flex justify-between">
        <button @click="isOpen = !isOpen"
                class="btn-blue mr-4">Reply
        </button>
        @if(auth()->user()->isAdmin)
            <button @click="isOpenRadio = !isOpenRadio"
                    class="btn">Set Status
            </button>
            <div x-cloak
                 x-show="isOpenRadio"
                 class="card z-10 absolute w-1/3 top-[40%] left-[20%] text-left bg-white  py-3 px-2 rounded-xl flex items-center flex-col">
                <form action="{{$idea->path().'/status'}}" method="post">
                    @csrf
                    <div class="mb-4">
                        @foreach($statuses as $status)
                            <div class="flex items-center mb-4">
                                <input id="default-radio-{{$status->id}}"
                                       type="radio" value="{{$status->id}}"
                                       {{$status->id ==$idea->status->id ? 'checked':''}}
                                       name="status_id"
                                       class="text-green-600 w-4 h-4  bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-{{$status->id}}"
                                       class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$status->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>


                    <textarea
                        class="w-full text-gray-900 rounded-xl border-none px-4 py-2 bg-gray-100"
                        name="update_comment"
                        id="text"
                        cols="20"
                        rows="5"
                        placeholder="Update a comment (optional)"
                    ></textarea>

                    <div class="flex justify-between mt-2">
                        <button
                            class="flex items-center justify-center w-1/2 mr-4 h11 text-sm rounded-xl bg-gray-200 py-4 hover:border-gray-400"
                            type="button">
                            <i class="fa-solid fa-paperclip mr-1"></i>
                            <span>Attach</span>
                        </button>
                        <button
                            class="flex items-center justify-center w-1/2 h11 text-sm rounded-xl bg-blue-500 text-white py-4 hover:border-gray-400"
                            type="submit">Update
                        </button>
                    </div>

                    <div class="flex items-center mb-2">
                        <input id="default-checkbox" name="notify" type="checkbox" value="1"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Notify All Voters
                        </label>
                    </div>

                </form>
            </div>
            <div x-cloak
                 x-show="isOpen"
                 class="card z-10 absolute w-1/3 top-[50%] left-[10%] text-left bg-white  py-3 px-2 rounded-xl flex items-center flex-col">
                <form action="{{$idea->path()}}" method="post" class="p-4 w-full">
                    @csrf
                    <textarea
                        class="w-full text-gray-900 rounded-xl border-none px-4 py-2 bg-gray-100"
                        name="text"
                        id="text"
                        cols="20"
                        rows="5"
                        placeholder="Share your thoughts on this idea..."
                    ></textarea>
                    <input type="hidden" name="user_id" value="{{auth()->id()}}">
                    <div
                        class="flex justify-between items-center w-full align-middle mt-2">
                        <button type="submit" class="btn-blue mr-4">Post</button>
                        <button class="btn "><i class="fa-solid fa-paperclip mr-1"></i>Attach</button>
                    </div>
                </form>
            </div>
        @endif

    </div>
    <div class="w-full flex justify-end items-center">
        <span class="mr-4 bg-white px-4 py-2 rounded-3xl flex flex-col items-center">
            <span class="font-bold text-xl">
                {{count($idea->votes)}}
            </span>
            <span class="text-gray-400">
                votes
            </span>
        </span>
        <button class=" {{$idea->isVoted(auth()->user()) ? 'text-white bg-blue-600 hover:bg-blue-700' : 'bg-gray-200 hover:bg-gray-400'}}
        transition duration-150 ease-in-out p-4 rounded-xl">
            Voted
        </button>
    </div>
</div>
