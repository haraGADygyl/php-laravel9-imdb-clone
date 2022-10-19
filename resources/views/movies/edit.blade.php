<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-white leading-tight">
            {{ __('Edit Movie') }}
        </h2>
    </x-slot>

    <div class="py-1 bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white icon shadow-sm sm:rounded-lg">
                <div class="p-1 bg-gray-800 border-4 border-gray-100 rounded-xl">
                    <div class="mt-4 ml-5">
                        <form method="post" enctype="multipart/form-data" action="{{ route('movies.update', $movie) }}">
                            @method('PUT')
                            @csrf
                            <div>
                                <div>Name:</div>
                                <div>
                                    <input type="text" name="name" value="{{ $movie->name }}"
                                           class="mb-2 rounded-xl w-[18rem] bg-gray-200 text-lg text-gray-800">
                                </div>
                                <div>
                                    @error('name')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>Year:</div>
                                <div>
                                    <input type="number" name="year" min="1800" value="{{ $movie->year }}"
                                           class="mb-2 rounded-xl w-[18rem] bg-gray-200 text-lg text-gray-800">
                                </div>
                                <div>
                                    @error('year')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>Rating:</div>
                                <div>
                                    <select name="rating"
                                            class="text-left inline-flex items-center w-[18rem] py-2 mb-2 rounded-xl bg-gray-200 border border-transparent font-semibold text-lg text-gray-800 hover:bg-gray-200 active:bg-gray-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        @for($i=1;$i<=10;$i++)
                                            <option value="{{ $i }}" @selected($i == $movie->rating)>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div>
                                    @error('rating')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>Actors:</div>
                                <div>
                                    <input type="text" name="actors" value="{{ $movie->actors }}"
                                           class="mb-2 rounded-xl w-[18rem] bg-gray-200 text-lg text-gray-800">
                                </div>
                                <div>
                                    @error('actors')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div>Genre:</div>
                                    <div>
                                        <select name="genre_id"
                                                class="text-left items-center w-[18rem] py-2 mb-2 rounded-xl bg-gray-200 border border-transparent font-semibold text-lg text-gray-800 hover:bg-gray-200 active:bg-gray-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            @foreach($genres as $genre)
                                                <option
                                                    value="{{ $genre->id }}" @selected($genre->id == $movie->genre_id)>{{ $genre->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        @error('genre_id')
                                        <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>Poster:</div>
                                <div>
                                    <input type="file" name="poster" value="{{ $movie->poster }}"
                                           class="mb-2 rounded-xl w-[18rem] py-2 bg-gray-200 text-lg text-gray-800 ">
                                </div>
                                <div>
                                    @error('poster')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>Trailer:</div>
                                <div>
                                    <input type="url" name="trailer_link" value="{{ $movie->trailer_link }}"
                                           class="mb-2 rounded-xl w-[18rem] bg-gray-200 text-lg text-gray-800">
                                </div>
                                <div>
                                    @error('trailer_link')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <a class="inline-flex items-center px-6 py-3 mb-4 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                   href="{{ route('movies.index') }}">Back</a>
                                <button
                                    class="mt-3 inline-flex items-center px-6 py-3 mb-4 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                    type="submit">Save
                                </button>
                                <button type="button"
                                        class="inline-flex items-center px-6 py-3 mb-4 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                        onclick="event.preventDefault();
                                            document.getElementById('delete-task-form').submit();"
                                >Delete
                                </button>
                            </div>
                        </form>
                        <form method="post" id="delete-task-form" action=" {{ route('movies.destroy', $movie) }}">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
