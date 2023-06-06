@php use Illuminate\Support\Str; @endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,600&display=swap" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased bg-gray-background text-gray-900 text-sm">
<header class="flex items-center  justify-between px-8 py-4">
    @include('layouts._header')
</header>

<main class="container mx-auto flex w-[1100px]">
    <div class=" mr-[20px] w-[280px]">
        <div
            class="border-2 border-transparent rounded-xl mt-16 bg-white transition duration-150 hover:border-blue-400">
            @auth()
                @include('ideas.create')
            @else
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Add an idea</h3>
                    <p class="text-sm mt-4">Log in to add any new ideas</p>
                </div>
                <div class="mt-6 flex">
                    <a href="{{ route('login') }}"
                       class=" m-2 flex items-center justify-center w-1/2 h11 text-sm rounded-xl bg-blue-500 text-white py-4 hover:border-gray-400">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class=" m-2 flex items-center justify-center w-1/2 h11 text-sm rounded-xl bg-blue-500 text-white py-4 hover:border-gray-400">Register</a>
                    @endif
                </div>
            @endauth

        </div>
    </div>

    <div class="w-[800px]">
        <nav class="flex items-center justify-between text-sm">
            @foreach($statuses->chunk(3) as $statuses)
                <ul class="flex uppercase font-semibold  border-b-4 pb-3 space-x-10">
                    @foreach($statuses as $status)
                        <li>
                            <a href="/ideas?q={{$status->name}}"
                               class="{{ request()->query('q') == $status->name ? 'border-blue-400' : ''}}
                               border-b-4 pb-3 ">
                                {{getStatus($status)}} ({{getCount($status_count,$status)}})
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </nav>

        <div class="mt-8">
            {{$slot}}
        </div>
    </div>
</main>

</body>
</html>
