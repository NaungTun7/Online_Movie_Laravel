<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extra;
use App\Movie;
use App\Serie;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $extras=Extra::orderBy('created_at','asc')->paginate(5);
        
        return view('backend.extras.index',compact('extras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies=Movie::all();
        $series=Serie::all();
        return view('backend.extras.create',compact('movies','series'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= $request->validate([
        'rating' => 'required|string',
        'duration' => 'required|string',
        'review' => 'required|string',
        'type' => 'required|string',
        'quality' => 'required|string',
        'year' => 'required|string',
        'movie' => 'required',
        //'serie' => 'required',
]);
  
        
        //Store Data
          $extra=new Extra;
          $extra->rating=$request->rating;
          $extra->duration=$request->duration;
          $extra->review=$request->review;
          $extra->type=$request->type;
          $extra->quality=$request->quality;
          $extra->year=$request->year;
          $extra->movie_id=$request->movie;
          //$extra->serie_id=$request->serie;

          $extra->save();


        //Redirect
          return redirect()->route('extras.index');
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
       $movies=Movie::all();
        $series=Serie::all();
         $extra=Extra::find($id);
         //dd($item);
         return view('backend.extras.edit',compact('extra','movies','series'));
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
        $request->validate([
        'rating' => 'required|string',
        'duration' => 'required|string',
         'review' => 'required|string',
          'type' => 'required|string',
          'quality' => 'required|string',
          'year' => 'required|string',
          'movie' => 'required',
        //'serie' => 'required',
]);

        //Update Data
          $extra=Extra::find($id);
          $extra->rating=$request->rating;
          $extra->duration=$request->duration;
          
          $extra->review=$request->review;
          $extra->type=$request->type;
          $extra->quality=$request->quality;
          $extra->year=$request->year;
          $extra->movie_id=$request->movie;
          //$extra->serie_id=$request->serie;

          $extra->save();


        //Redirect
          return redirect()->route('extras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extra=Extra::find($id);
       
       $extra->delete();
       return redirect()->route('extras.index');
    }
}
