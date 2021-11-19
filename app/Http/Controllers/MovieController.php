<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::get();
        echo json_encode($movies);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $movie = Movie::find($id);
        echo json_encode($movie);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->description    = $request->input('description');
        $movie->name           = $request->input('name');
        $movie->genre          = $request->input('genre');
        $movie->duration       = $request->input('duration');
        $movie->year           = $request->input('year');
        $movie->save();

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $movie_id)
    {
        $movie = Movie::findOrFail($movie_id);
        $movie->description    = $request->input('description');
        $movie->name           = $request->input('name');
        $movie->genre          = $request->input('genre');
        $movie->duration       = $request->input('duration');
        $movie->year           = $request->input('year');
        $movie->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
    }
}
