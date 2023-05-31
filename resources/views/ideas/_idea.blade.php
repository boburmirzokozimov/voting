<div class="idea-container hover:shadow-md flex rounded-xl mt-8 bg-white">
    <div
        class="idea-container mr-4 border-r-2 border-r-gray-background px-4 py-4 flex flex-col items-center justify-between">
        <div class="text-center text-gray-400 mb-2">
            <span class="text-gray-900 font-extrabold text-xl">12</span>
            <br>
            Votes
        </div>

        <form action="#" method="post">
            <button class="bg-gray-200 hover:bg-gray-400 transition duration-150 ease-in-out p-4 rounded-xl">
                Vote
            </button>
        </form>
    </div>
    <div class="flex w-full  py-4">
        <div class="w-[200px] flex justify-center">
            <a href="#">
                <img
                    src="{{gravatar_url($idea->creator->email)}}"
                    alt="avatar"
                    class="w-10 h-10 rounded-xl"
                >
            </a>
        </div>
        <div>
            <div class="content mb-3 px-4">
                <h2 class="text-3xl font-extrabold mb-2">{{$idea->title}}</h2>
                <p class="line-clamp-3">
                    {{$idea->description}}
                </p>
            </div>
            <div class="flex details ">
                <div class="w-[300px] mr-4">
                    <div class="flex justify-between text-gray-400 list-none">
                        <div>{{$idea->created_at->diffForHumans()}}</div>
                        <div>&bull; Category</div>
                        <div>&bull;6 Comments</div>
                    </div>
                </div>
                <div class="flex justify-between" x-data="{ isOpen : false }">
                    <div
                        class="px-6 mr-2 items-center align-middle text-center bg-gray-background rounded-xl py-1 text-sm">
                        OPEN
                    </div>
                    <button @click="isOpen = !isOpen"
                            @click.away="isOpen = false"
                            class="bg-gray-background px-6 rounded-xl text-gray-400 mr-2">
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
