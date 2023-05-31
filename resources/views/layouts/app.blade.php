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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-background text-gray-900 text-sm">
<header class="flex items-center  justify-between px-8 py-4">
    <a href="#">Logo goes here</a>
    <div class="flex items-center ">
        @if (Route::has('login'))
            <div class="p-6 text-right z-10">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}"
                           class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <a href="#">
            <img
                src="https://gravatar.com/avatar/000000000000000000000000000?d=mp"
                alt="avatar"
                class="w-10 h-10 rounded-full"
            >
        </a>
    </div>
</header>

<main class="container mx-auto flex w-[1000px]">
    <div class=" mr-[20px] w-[280px]">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam at dolores, fugit iste, iure laboriosam
        molestias non nostrum obcaecati optio provident quas reiciendis similique tempore velit. Consectetur delectus
        reprehenderit voluptatibus.
    </div>

    <div class="w-[700px]">
        <nav class="flex items-center justify-between text-sm">
            <ul class="flex uppercase font-semibold  border-b-4 pb-3 space-x-10">
                <li>
                    <a href="#"
                       class="border-b-4 pb-3 border-blue-400">All Ideas(87)
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="text-gray-400 border-b-4 pb-3 hover:border-blue-400 hover:text-gray-900 transition duration-150 ease-in-out">Considering(87)
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="text-gray-400 border-b-4 pb-3 hover:border-blue-400  hover:text-gray-900 transition duration-150 ease-in-out">In
                        Progress(87)
                    </a>
                </li>
            </ul>
            <ul class="flex uppercase font-semibold  border-b-4 pb-3 space-x-10">
                <li>
                    <a href="#"
                       class="text-gray-400 border-b-4 pb-3 hover:border-blue-400  hover:text-gray-900 transition duration-150 ease-in-out">Implemented(10)
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="text-gray-400 border-b-4 pb-3 hover:border-blue-400 hover:text-gray-900 transition duration-150 ease-in-out">Closed(50)
                    </a>
                </li>
            </ul>
        </nav>

        <div class="mt-8">
            {{$slot}}
        </div>
    </div>
</main>

</body>
</html>
