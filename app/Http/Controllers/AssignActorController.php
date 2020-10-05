<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Movie;
use Illuminate\Support\Facades\DB;
class AssignActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dp =DB::table('actor_movie')->get();
        $actor_movies=$dp->map(function($element){
            $actor =Actor::find($element->actor_id)->name;
             $movie =Movie::find($element->movie_id)->name;
             return[
                'actor'=>$actor,
                'movie'=>$movie,
                'id'=>$element->id,
             ];
        });
        $infos = DB::table('actor_movie')
            
            ->join('actors', 'actor_movie.actor_id', '=', 'actors.id')
            ->join('movies', 'actor_movie.movie_id', '=', 'movies.id')
            ->select('actor_movie.id','actors.name as actorname','movies.name as moviename')
            ->get();
        // dd($users);
        // $actors = Actor::all();
        // $movies = Movie::all();
        // dd($actor_movies);
        return view('backend.assignactors.index',compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actors = Actor::all();
        $movies = Movie::all();
        return view ('backend.assignactors.create',compact('actors','movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = Movie::find($request->movie);
        $movie->actors()->attach($request->actor);
        return redirect()->route('assignactors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
