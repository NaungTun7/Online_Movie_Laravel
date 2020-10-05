<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $links=Link::orderBy('created_at','asc')->paginate(5);
        
        return view('backend.links.index',compact('links'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.links.create');
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
        'link_text' => 'required|string',
        
        ]);
        //Store Data
          $link=new Link;

          //$link->id=$request->id;
          $link->link_text=$request->link_text;

          $link->save();

          return redirect()->route('links.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $link=Link::find($id);
        return view('backend.links.show',compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link=Link::find($id);
         //dd($item);
         return view('backend.links.edit',compact('link'));
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
        'link_text' => 'required',
        
        
]);


        //Update Data
          $link=Link::find($id);
          //$link->id=$request->id;
          $link->link_text=$request->link_text;
          
          $link->save();


        //Redirect
          return redirect()->route('links.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $link=Link::find($id);
       //delete related  file from storage
       $link->delete();
       return redirect()->route('links.index');
    }
}
