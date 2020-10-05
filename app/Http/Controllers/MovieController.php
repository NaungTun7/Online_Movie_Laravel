<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Link;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $movies=Movie::orderBy('created_at','asc')->paginate(5);
        
        return view('backend.movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $links=Link::all();
       
        return view('backend.movies.create',compact('links'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$validator= $request->validate([
        
//         'name' => 'required|string',
//         'link' => 'required',
        
// ]);
        //Store Data
        $profile=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backendtemplate/movieImg'),$profile);
         $a=new Movie;
          
          $a->name=$request->name;
          
          $a->photo=$profile;
          $a->link_id=$request->link;
          

          $a->save();


        //Redirect
          return redirect()->route('movies.index');
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
        
         $movie=Movie::find($id);
         //dd($item);
         return view('backend.movies.edit',compact('movie','links'));
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
        
        //dd($request);//var_dump();die();//print output
        //Validation
        $request->validate([
       
        'name' => 'required|string',
         
        'photo' => 'nullable|sometimes|image',
        'link' => 'required',
        
]);
       if($request->hasFile('nextphoto')){
        $profile = time().'.'.$request->nextphoto->extension();

        $request->nextphoto->move(public_path('backendtemplate/movieImg'),$profile);
       }else{
        $profile = $movie->photo;
       }
        
        
        //Update Data
          $movie=Movie::find($id);
          
          $movie->name=$request->name;
          
          $movie->photo=$profile;

          $movie->link_id=$request->link;
         

          $movie->save();


        //Redirect
          return redirect()->route('movies.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie=Movie::find($id);
       //delete related  file from storage
       $movie->delete();
       return redirect()->route('movies.index');
    }
}
