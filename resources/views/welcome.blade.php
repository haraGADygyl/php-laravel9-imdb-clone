<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased">
<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-800 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('movies') }}"
                   class="inline-flex items-center px-4 py-2 mt-4 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Movies</a>
            @else
                <a href="{{ route('login') }}"
                   class="inline-flex items-center px-4 py-2 mt-4 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Sign
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center px-4 py-2 mt-4 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="mt-24 py-1 bg-gray-800">
        <div class="w-auto h-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 bg-white border-b border-gray-200">

                    @php
                        $movies = \App\Models\Movie::with('genre')
                                  ->orderBy('updated_at', 'DESC')
                                  ->get();;
                    @endphp

                    @foreach($movies as $movie)
                        <a href="{{ route('login') }}">
                            <div
                                class="mb-1 flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <img
                                    class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                    src="{{ asset('storage/' . $movie->poster) }}"
                                    alt="">
                                <div>
                                    <div>
                                        <div class="flex flex-col justify-between p-4 leading-normal">
                                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                {{ $movie->name }} ({{ $movie->year }})</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex flex-col justify-between p-4 leading-normal">
                                            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                                                <b>Rating:</b> {{ number_format($movie->averageRating, 2) }} / 10
                                                ({{ $movie->usersRated() }} votes)
                                            </p>
                                            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                                                <b>Genre:</b> {{ $movie->genre->name }}
                                            </p>
                                            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                                                <b>Cast:</b> {{ $movie->actors }}</p>
                                            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                                                <a class="inline-flex items-center px-4 py-2 mt-4 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                                   href="{{ route('login') }}">Trailer</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
