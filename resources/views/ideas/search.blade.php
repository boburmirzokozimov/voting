<div>
    <form action="/ideas" method="get" class="filters flex space-x-6 items-center">
        <div class="w-1/3">
            <select onchange="this.form.submit()" name="category" id="category"
                    class="w-full text-gray-900 rounded-xl border-none px-4 py-2">
                <option value="">No Category</option>
                @foreach($categories as $key=>$value)
                    <option {{isSelectedCategory($key)}} value="{{$key}}">{{$key}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-1/3">
            <select onchange="this.form.submit()" name="other_filter" id="other_filters"
                    class="w-full text-gray-900 rounded-xl border-none px-4 py-2">
                <option {{isSelected('No Filter')}} value="No Filter">No Filter</option>
                <option {{isSelected('top')}} value="top">Top Voted</option>
                <option {{isSelected('me')}} value="me">My Ideas</option>
            </select>
        </div>
        <div class="w-2/3 relative">
            <i class="fa-solid text-gray-400 fa-magnifying-glass absolute bottom-[12px] left-[15px]"></i>
            <input onchange="this.form.submit()" type="search" name="search"
                   class="placeholder-gray-900 w-full rounded-xl border-none px-10 py-2"
                   placeholder="Find "
                   id="search">
        </div>
    </form>
</div>
