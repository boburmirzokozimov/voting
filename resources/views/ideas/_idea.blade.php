<div class="idea-container hover:shadow-md flex rounded-xl mt-8 bg-white">
    <div
        class="idea-container mr-4 border-r-2 border-r-gray-background px-4 py-4 flex flex-col items-center justify-between">
        <div class="text-center text-gray-400 mb-2">
            <span class="text-gray-900 font-extrabold text-xl">{{$idea->votes()->count()}}</span>
            <br>
            Votes
        </div>

        <form action="{{$idea->path().'/votes'}}" method="GET">
            @csrf
            <button
                class=" {{$idea->isVoted(auth()->user()) ? 'text-white bg-blue-600 hover:bg-blue-700' : 'bg-gray-200 hover:bg-gray-400'}}
                 transition duration-150 ease-in-out p-4 rounded-xl">
                Vote
            </button>
        </form>
    </div>
    <div class="flex w-full  py-4">
        <div class="w-[120px] flex justify-center">
            <a href="#">
                <img
                    src="{{gravatar_url($idea->user->email)}}"
                    alt="avatar"
                    class="w-10 h-10 rounded-xl"
                >
            </a>
        </div>
        <div class="w-full">
            <div class="content mb-3 px-4">
                <h2 class="text-3xl font-extrabold mb-2">
                    <a href="{{route('ideas.show',['idea'=>$idea->slug])}}">{{$idea->title}}</a>
                </h2>
                <p class="line-clamp-3">
                    {{$idea->description}}
                </p>
            </div>
            <div class="flex details justify-between">
                <div class="w-full mr-4">
                    <div class="w-3/4 flex justify-around text-gray-400 list-none">
                        <div class="">{{$idea->created_at->diffForHumans()}}</div>
                        <div class="">&bullet; {{$idea->category->name}}</div>
                        <div class=" font-bold">&bullet; {{$idea->comments()->count()}} comments</div>
                    </div>
                </div>
                @include('ideas._modal')
                @include('ideas._delete-modal')
                <div class="w-1/4 flex justify-end" x-data="{ isOpen : false }">
                    <div
                        class=" {{$idea->status->classes}} px-6 mr-2 items-center align-middle text-center rounded-xl py-1 text-sm">
                        {{$idea->status->name}}
                    </div>
                    @can('manage',$idea)
                        <button @click="isOpen = !isOpen"
                                @click.away="isOpen = false"
                                class="bg-gray-background px-6 rounded-xl text-gray-400 mr-2">
                            <i class="fa-solid fa-ellipsis"></i>
                            <ul
                                x-cloak
                                x-show="isOpen"
                                class=" absolute w-44 text-left bg-white ml-8 py-3 rounded-xl z-10">

                                <li>
                                    <a data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                                       class="hover:bg-gray-100 block transition duration-150 ease-in  px-5 py-3"
                                       type="button">
                                        Edit
                                    </a>
                                </li>
                                <li>
                                    <a data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                                       class="hover:bg-gray-100 block transition duration-150 ease-in  px-5 py-3"
                                       type="button">
                                        Delete
                                    </a>
                                </li>
                            </ul>
                        </button>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>


