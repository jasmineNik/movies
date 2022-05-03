<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

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
        return response()->view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        return response()->view('movies.create', compact('categories'));
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
        return \response()->view('movies.edit', compact('movie', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return Response
     */
    public function update ($request,$id)
    {
        $movie = Movie :: find($id);
        $movie->name = $request->input('name');
        $movie->description = $request->input('description');
        $movie->poster = $request->input('poster');
        $movie->price  = $request->input('date');
        $movie->date = $request->input('date');
        $movie->update();
        return Redirect('/')->width('update-Successfully');
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
