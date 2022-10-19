<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-white leading-tight">
            {{ __('Search Movies') }}
        </h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/gh/tofsjonas/sortable/sortable.min.js"></script>

    <div class="py-1 bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white icon shadow-sm sm:rounded-lg">
                <div class="p-1 bg-gray-800 border-4 border-gray-100 rounded-xl">
                    <div class="mt-4 ml-5">
                        <div class="container">

                            <form method="GET" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input
                                        type="text"
                                        name="search"
                                        value="{{ request()->get('search') }}"
                                        class="inline-flex items-center rounded-xl w-[18rem] py-1.5 bg-gray-200 text-lg text-gray-800"
                                        placeholder="Search...">
                                    <button
                                        class="mt-3 inline-flex items-center px-6 py-3 mb-4 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                        type="submit">Search
                                    </button>
                                </div>
                            </form>

                            @if(isset($search))
                                <table style="width:98%" class="sortable asc mb-4 border text-left">
                                    <thead>
                                    <tr class="text-center">
                                        <th style="width:8%" class="pb-2 pt-2 border border-slate-600">
                                            Poster
                                        </th>
                                        <th style="width:30%; cursor: pointer;" class="pb-2 pt-2 border border-slate-600">
                                            Name
                                        </th>
                                        <th style="width:5%; cursor: pointer;" class="pb-2 pt-2 border border-slate-600">
                                            Year
                                        </th>
                                        <th style="width:5%; cursor: pointer;" class="pb-2 pt-2 border border-slate-600">
                                            Genre
                                        </th>
                                        <th style="width:5%; cursor: pointer;" class="pb-2 pt-2 border border-slate-600">
                                            Rating
                                        </th>
                                        <th style="width:30%; cursor: pointer;" class="pb-2 pt-2 border border-slate-600">
                                            Actors
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($search as $searched)
                                        <tr>
                                            <td class="pb-2 pl-3 pr-2 border border-slate-600">
                                                <a href="{{ asset('storage/' . $searched->poster) }}" target="_blank">
                                                    <img
                                                        class="mt-2 object-cover w-auto h-auto "
                                                        src="{{ asset('storage/' . $searched->poster) }}"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td class="pb-2 pl-3 pr-2 border border-slate-600">
                                                <a href="{{ route('movies.edit', $searched) }}">{{ $searched->name }}</a>
                                            </td>
                                            <td class="pb-2 text-center border border-slate-600">{{ $searched->year }}</td>
                                            <td class="pb-2 text-center border border-slate-600">{{ $searched->genre->name }}</td>
                                            <td class="pb-2 text-center border border-slate-600">{{ $searched->rating }}</td>
                                            <td class="pb-2 pl-3 pr-2 border border-slate-600">{{ $searched->actors }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
