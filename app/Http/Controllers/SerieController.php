<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
/*use App\Link;*/

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $series=Serie::orderBy('created_at','asc')->paginate(5);
        
        return view('backend.series.index',compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $profile=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backendtemplate/serieImg'),$profile);

        $a=new Serie;
          
          $a->name=$request->name;
          $a->photo=$profile;
         /* $a->link_id=$request->link;*/
          

          $a->save();


        //Redirect
          return redirect()->route('series.index');
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
       /*  $links=Link::all();*/
        
         $serie=Serie::find($id);
         //dd($item);
         return view('backend.series.edit',compact('serie'));
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
       
        'name' => 'required|string',
        'photo' => 'nullable|sometimes|image',
       /* 'link' => 'required',*/
        
]);
        if($request->hasFile('nextphoto')){
        $profile = time().'.'.$request->nextphoto->extension();

        $request->nextphoto->move(public_path('backendtemplate/serieImg'),$profile);
       }else{
        $profile = $serie->photo;
       }

        
        
        //Update Data
          $serie=Serie::find($id);
          
          $serie->name=$request->name;
          $serie->photo=$profile;
         /* $serie->link_id=$request->link;*/
         

          $serie->save();


        //Redirect
          return redirect()->route('series.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie=Serie::find($id);
       //delete related  file from storage
       $serie->delete();
       return redirect()->route('series.index');
    }
}
