<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-white leading-tight">
            {{ __('My Movies') }}
        </h2>
    </x-slot>

    <div class="py-1 bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 bg-white border-b border-gray-200">
                    @foreach($my_movies as $movie)
                        <div
                            class="mb-1 flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <a href="{{ asset('storage/' . $movie->poster) }}" target="_blank">
                                <img
                                    class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                    src="{{ asset('storage/' . $movie->poster) }}"
                                    alt="">
                            </a>
                            <div>
                                <div>
                                    <a href="{{ route('movies.edit', $movie) }}">
                                        <div class="flex flex-col justify-between p-4 leading-normal">
                                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                {{ $movie->name }} ({{ $movie->year }})</h5>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <div class="flex flex-col justify-between p-4 leading-normal">
                                        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                                            <b>Rating:</b> {{ number_format($movie->averageRating, 2) }}
                                        </p>
                                        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                                            <b>Genre:</b> {{ $movie->genre->name }}
                                        </p>
                                        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                                            <b>Cast:</b> {{ $movie->actors }}</p>
                                        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                                            <a class="inline-flex items-center px-4 py-2 mt-4 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                               href="{{ $movie->trailer_link }}" target="_blank">Trailer</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
