<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Month;
class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads=Ad::all();
        
        return view('backend.ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $months=Month::all();
       
        return view('backend.ads.create',compact('months'));
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
        $request->photo->move(public_path('backendtemplate/adImg'),$profile);
         $a=new Ad;
          
          $a->name=$request->name;
          $a->ph_no=$request->ph_no;
          $a->photo=$profile;
         $a->position=$request->position;
          $a->month_id=$request->month;
          $a->month_id=$request->price;
          

          $a->save();


        //Redirect
          return redirect()->route('ads.index');
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
      
         $months=Month::all();
        
         $ad=Ad::find($id);
         //dd($item);
         return view('backend.ads.edit',compact('ad','months'));
    
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
         'ph_no' => 'required|string',
          'photo' => 'nullable|sometimes|image',
         'position' => 'required|string',
       
           'month' => 'required',
        
]);
       if($request->hasFile('nextphoto')){
        $profile = time().'.'.$request->nextphoto->extension();

        $request->nextphoto->move(public_path('backendtemplate/adImg'),$profile);
       }else{
        $profile = $ad->photo;
       }
        
        
       
          $ad=Ad::find($id);
          
          $ad->name=$request->name;
          $ad->ph_no=$request->ph_no;
          $ad->photo=$profile;
          $ad->position=$request->position;
          $ad->month_id=$request->month;
        /* $ad->month_id=$request->price;*/

          $ad->save();
          return redirect()->route('ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad=Ad::find($id);
       //delete related  file from storage
       $ad->delete();
       return redirect()->route('ads.index');
    }
}
