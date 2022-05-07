<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Language;

use App\Models\Country;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $movies  = Movie::all();
        return response()->view('movies.index',
            compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();

        $languages = Language::all();

        $countries = Country::all();
        return response()->view('movies.create',
            compact('categories', 'countries','languages'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMovieRequest $request)
    {
        $movie = Movie::create($request->validated());
        $movie->categories()->attach($request->validated()['categories']);
        $movie->languages()->attach($request->validated()['languages']);
        return response()->redirectToRoute('movies');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return Response
     */
    public function edit($id)
    {
//        $movie = Movie::where('id', $id)->first();
//        $movie = Movie::find($id);
//        if(empty($movie)){
//            abort(404, 'where is no movie');
//        }
        $categories = Category::all();
        $movie = Movie::findOrFail($id);
        $movie_categories = $movie->categories()->get();
        $languages = Language::all();
        $movie_languages = $movie->languages()->get();


        return \response()->view('movies.edit', compact('movie', 'languages', 'movie_languages', 'movie', 'categories', 'movie_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMovieRequest $request)
    {
        $movie = Movie::id($request->validated()['id'])->first();
        $movie->categories()->sync($request->validated()['categories']);
        $movie->languages()->sync($request->validated()['languages']);
        $movie->update($request->validated());
        return \response()->redirectToRoute('movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
