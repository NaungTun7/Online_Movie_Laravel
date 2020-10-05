<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Serie;
use Illuminate\Support\Facades\DB;

class AssignSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $dp =DB::table('actor_serie')->get();
        $actor_series=$dp->map(function($element){
            $actor =Actor::find($element->actor_id)->name;
             $serie =Serie::find($element->serie_id)->name;
             return[
                'actor'=>$actor,
                'serie'=>$serie,
                'id'=>$element->id,
             ];
        });
        $infos = DB::table('actor_serie')
            
            ->join('actors', 'actor_serie.actor_id', '=', 'actors.id')
            ->join('series', 'actor_serie.serie_id', '=', 'series.id')
            ->select('actor_serie.id','actors.name as actorname','series.name as seriename')
            ->get();
        // dd($users);
        // $actors = Actor::all();
        // $movies = Movie::all();
        // dd($actor_movies);
        return view('backend.assignseries.index',compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $actors = Actor::all();
        $series = Serie::all();
        return view ('backend.assignseries.create',compact('actors','series'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $serie = Serie::find($request->serie);
        $serie->actors()->attach($request->actor);
        return redirect()->route('assignseries.index');
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
