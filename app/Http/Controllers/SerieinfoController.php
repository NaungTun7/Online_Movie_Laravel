<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serieinfo;
use App\Link;
use App\Serie;

class SerieinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serieinfos=Serieinfo::orderBy('created_at','asc')->paginate(5);
        
        return view('backend.serieinfos.index',compact('serieinfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $links=Link::all();
        $series=Serie::all();
        return view('backend.serieinfos.create',compact('links','series'));
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
        'season_no' => 'required|integer',
        'episode_no' => 'required|integer',
        'link' => 'required',
        'serie' => 'required',
]);
  
        //File Upload
        
        //Store Data
          $serieinfo=new Serieinfo;
          $serieinfo->rating=$request->rating;
          $serieinfo->duration=$request->duration;
          $serieinfo->review=$request->review;
          $serieinfo->type=$request->type;
          $serieinfo->quality=$request->quality;
          $serieinfo->year=$request->year;
          $serieinfo->season_no=$request->season_no;
          $serieinfo->episode_no=$request->episode_no;
          $serieinfo->link_id=$request->link;
          $serieinfo->serie_id=$request->serie;

          $serieinfo->save();


        //Redirect
          return redirect()->route('serieinfos.index');
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
        $links=Link::all();
        $series=Serie::all();
         $serieinfo=Serieinfo::find($id);
         //dd($item);
         return view('backend.serieinfos.edit',compact('serieinfo','links','series'));
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
        'season_no' => 'required|integer',
        'episode_no' => 'required|integer',
        'link' => 'required',
        'serie' => 'required',
]);


        //Update Data
          $serieinfo=Serieinfo::find($id);
          $serieinfo->rating=$request->rating;
          $serieinfo->duration=$request->duration;
          
          $serieinfo->review=$request->review;
          $serieinfo->type=$request->type;
          $serieinfo->quality=$request->quality;
          $serieinfo->season_no=$request->season_no;
          $serieinfo->episode_no=$request->episode_no;
          $serieinfo->link_id=$request->link;
          $serieinfo->serie_id=$request->serie;

          $serieinfo->save();


        //Redirect
          return redirect()->route('serieinfos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $serieinfo=Serieinfo::find($id);
       //delete related  file from storage
       $serieinfo->delete();
       return redirect()->route('serieinfos.index');
    }
}
