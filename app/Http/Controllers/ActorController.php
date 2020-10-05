<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $actors=Actor::orderBy('created_at','asc')->paginate(5);
        
        return view('backend.actors.index',compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.actors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        /*'id'=>'required|integer',*/
        'name' => 'required|string',
        
        ]);
        //Store Data
          $actor=new Actor;

          //$link->id=$request->id;
          $actor->name=$request->name;

          $actor->save();

          return redirect()->route('actors.index');
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
        $actor=Actor::find($id);
         //dd($item);
         return view('backend.actors.edit',compact('actor'));
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
        /*'id'=>'required',*/
        'name' => 'required',
        
        
]);


        //Update Data
          $actor=Actor::find($id);
          //$link->id=$request->id;
          $actor->name=$request->name;
          
          $actor->save();


        //Redirect
          return redirect()->route('actors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $actor=Actor::find($id);
       //delete related  file from storage
       $actor->delete();
       return redirect()->route('actors.index');
    }
}
