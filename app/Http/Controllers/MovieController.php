<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $movies = Movie::with('genre')
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $genres = Genre::all();

        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(StoreMovieRequest $request)
    {

        Movie::create([
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'rating' => $request->input('rating'),
            'actors' => $request->input('actors'),
            'poster' => $request->file('poster')->store('posters', 'public'),
            'trailer_link' => $request->input('trailer_link'),
            'genre_id' => $request->input('genre_id'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('movies.index');
    }

    /**
     * Display all resources of the current user.
     *
     * @param Movie $movie
     * @return Application|Factory|View
     */
    public function my_movies()
    {
        $my_movies = Movie::with('genre')
            ->where('user_id', '=', Auth::user()->id)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('my-movies', compact('my_movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Movie $movie
     * @return Application|Factory|View
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::get();

        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Movie $movie
     * @return RedirectResponse
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        if ($request->hasFile('poster')) {
            Storage::disk('public')->delete($movie->poster);
            $poster = $request->file('poster')->store('posters', 'public');
        } else {
            $poster = $movie->poster;
        }

        $movie->update([
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'rating' => $request->input('rating'),
            'actors' => $request->input('actors'),
            'poster' => $poster,
            'trailer_link' => $request->input('trailer_link'),
            'genre_id' => $request->input('genre_id'),
        ]);

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Movie $movie
     * @return RedirectResponse
     */
    public function destroy(Movie $movie)
    {
        Storage::disk('public')->delete($movie->poster);
        $movie->delete();

        return redirect()->route('movies.index');
    }
}
