<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
//        $actors = Http::withHeaders(
//            [
//                "X-RapidAPI-Host" => env('X_RapidAPI_Host'),
//                "X-RapidAPI-Key" => env('X_RapidAPI_Key')
//            ]
//        )->get('https://netflix-unofficial.p.rapidapi.com/api/genres');
//        $cur_rate = Http::withHeaders([
//            "apikey" => env('API_LAYER')
//        ])->get("https://api.apilayer.com/exchangerates_data/convert?to=USD&from=AMD&amount=4600");
//        dd(json_decode($cur_rate->body(), true));

        $categories = Category::all();
        $countries = Country::all();
        return response()->view('movies.create',
            compact('categories', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $poster = $request->file('poster');
//        $path = $poster->move(public_path("images"),
//            $poster->getClientOriginalName());
        $path = $poster->storeAs('public/images',
            $poster->getClientOriginalName());
        dd($path);
        $movie = Movie::create($request->validated());
        $movie->categories()->attach($request->validated()['categories']);
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

        return \response()->view('movies.edit',
            compact('movie', 'categories', 'movie_categories'));
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
