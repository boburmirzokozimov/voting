<div x-data="{isOpen : false}"
     class="card p-4 mb-2">
    <div class="flex">
        <div class="w-[100px] flex justify-center">
            <img
                class="w-10 h-10 rounded-xl"
                src="{{gravatar_url($comment->user->email)}}"
                alt="avatar">
        </div>
        <div class="flex flex-col flex-1">
            <div class="p-2">
                {{$comment->text}}
            </div>
            <div class="flex  justify-between">
                <div class="w-1/2 flex">
                    <span class="font-bold mr-2">{{$comment->user->name}}</span>
                    <span class="text-gray-400">{{$comment->created_at->diffForHumans()}}</span>
                </div>
                <div class="w-1/2 flex justify-end">
                    <button @click="isOpen = !isOpen"
                            @click.away="isOpen = false"
                            class="bg-gray-background px-6 rounded-xl text-gray-400 mr-2 flex-end">
                        <i class="fa-solid fa-ellipsis"></i>
                        <ul
                            x-cloak
                            x-show="isOpen"
                            class=" absolute w-44 text-left bg-white ml-8 py-3 rounded-xl">
                            <li>
                                <a class="hover:bg-gray-100 block transition duration-150 ease-in  px-5 py-3"
                                   href="#">Mark
                                    As
                                    Spam
                                </a>
                            </li>
                            <li>
                                <a class="hover:bg
                                -gray-100 block transition duration-150 ease-in  px-5 py-3"
                                   href="#">Delete Post
                                </a>
                            </li>
                        </ul>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

