<x-app-layout>
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
        <div class="idea-container hover:shadow-md flex rounded-xl mt-8 bg-white">
            <div
                class="idea-container /6 mr-4 border-r-2 border-r-gray-background px-4 py-4 flex flex-col items-center justify-between">
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
            <div class="flex w-full px-4 py-4">
                <div class="w-1/2">
                    <a href="#">
                        <img
                            src="https://gravatar.com/avatar/000000000000000000000000000?d=mp"
                            alt="avatar"
                            class="w-10 h-10 rounded-xl"
                        >
                    </a>
                </div>
                <div>
                    <div class="content mb-3">
                        <h2 class="text-3xl font-extrabold mb-2">Title of the idea</h2>
                        <p class="line-clamp-3">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto asperiores
                            assumenda at aut beatae commodi debitis delectus dolor dolorem doloribus et eum inventore
                            laboriosam
                            laborum laudantium libero magni maiores maxime omnis optio placeat praesentium provident
                            quam
                            rem
                            repellendus repudiandae rerum sed soluta, tempora tenetur ut velit vitae voluptates
                            voluptatum?
                        </p>
                    </div>
                    <div class="flex details">
                        <div class="w-7/12 mr-14">
                            <ul class="flex justify-between text-gray-400 list-disc">
                                <li class="list-none">10 hours ago</li>
                                <li>Category</li>
                                <li>6 Comments</li>
                            </ul>
                        </div>
                        <div class="w-3/12 flex justify-between">
                        <span
                            class="px-6 mr-2 items-center align-middle text-center bg-gray-background rounded-xl py-1 text-sm">OPEN</span>
                            <button class="bg-gray-background px-6 rounded-xl text-gray-400">&bull;&bull;&bull;</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
