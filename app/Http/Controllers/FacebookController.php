<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facebook;
class FacebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facebooks=Facebook::all();
        
        return view('backend.facebooks.index',compact('facebooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.facebooks.create');
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
        $request->photo->move(public_path('backendtemplate/facebookImg'),$profile);
         $a=new Facebook;
          
          $a->name=$request->name;
           $a->fb_id=$request->fb_id;
          $a->photo=$profile;
         
          $a->save();


        //Redirect
          return redirect()->route('facebooks.index');
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
        $facebook=Facebook::find($id);
         //dd($item);
         return view('backend.facebooks.edit',compact('facebook'));
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
         'fb_id' => 'required|string',
        'photo' => 'nullable|sometimes|image',
       /* 'link' => 'required',*/
        
]);
        if($request->hasFile('nextphoto')){
        $profile = time().'.'.$request->nextphoto->extension();

        $request->nextphoto->move(public_path('backendtemplate/facebookImg'),$profile);
       }else{
        $profile = $facebook->photo;
       }

        
        
        //Update Data
          $facebook=Facebook::find($id);
          
          $facebook->name=$request->name;
          $facebook->photo=$profile;
          $facebook->fb_id=$request->fb_id;
         /* $serie->link_id=$request->link;*/
         

          $facebook->save();


        //Redirect
          return redirect()->route('facebooks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $facebook=Facebook::find($id);
       //delete related  file from storage
       $facebook->delete();
       return redirect()->route('facebooks.index');
    }
}
