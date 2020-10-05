<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Movie;
use App\Extra;
use App\Serie;
use App\Serieinfo;
use App\Ad;
use App\Actor;
use DB;
use Illuminate\Support\Str;
class FrontendController extends Controller
{
    /*public function home(){
    	return view('frontend.home');

    }*/
     public function home(Request $request){
        $ad = Ad::all();
        if(filter_var($request->query('query', false), FILTER_VALIDATE_BOOLEAN))
        {
            if($request->input('type') === 'movie')
            {
                $actor = \App\Actor::find($request->input('actorid'));
                $movies = $actor->movies()->orderBy('id', 'desc')->paginate(12);
                $extras=Extra::orderBy('id','desc')->paginate(12);   
            }  
            if($request->input('type') === 'series')
            {
                $actor =\App\Actor::find($request->input('actorid'));
                $series = $actor->series()->orderBy('id', 'desc')->get();
                $serieinfos = Serieinfo::orderBy('id', 'desc');
                foreach ($series as $key => $value) {
                        $series[$key]->serieinfo->review = Str::limit($series[$key]->serieinfo->review, 100);
                    }
                     $typegroup = DB::table('serieinfos')
                             ->select('type')
                             ->groupBy('type')
                             ->get();
                       $yeargroup = DB::table('serieinfos')
                             ->select('year')
                             ->groupBy('year')
                             ->get();       
                return view('frontend.serie',compact('series','serieinfos','typegroup','yeargroup'));
            }      
        }
        else
        {
            $movies=Movie::orderBy('id','desc')->paginate(12);
            $extras=Extra::orderBy('id','desc')->paginate(12);
        }
            $yeargroup = DB::table('extras')
                     ->select('year')
                     ->groupBy('year')
                     ->get();
            $typegroup = DB::table('extras')
                     ->select('type')
                     ->groupBy('type')
                     ->get();
                    // dd($yeargroup);
            foreach ($movies as $key => $value) {
                # code...
                $movies[$key]->extra->review = Str::limit($movies[$key]->extra->review, 100);
            }
    	return view('frontend.home',compact('movies','ad','extras','yeargroup','typegroup'));
    	// return view('frontend.home',compact('extras'));
    }
    public function movie_detail($id)
    {
    	$movie = Movie::find($id);
        $movie->actors;
    	$movie->extra;
    	$movie->link;
        $comments = \App\Comment::all();
    	$movie['img_url'] = url('backendtemplate/movieImg/' . $movie->photo);
    	return view('frontend.movie_detail', compact('movie', 'comments'));
    }
    public function dcma(){
    	$movies=Movie::orderBy('id','desc')->get();
    	$extras=Extra::orderBy('id','desc')->get();
    	return view('frontend.dcma',compact('movies'));
    	return view('frontend.dcma',compact('extras'));
    }
     public function serie(){
        $series=Serie::orderBy('id','desc')->get();
        $serieinfos=Serieinfo::orderBy('id','desc')->get();
        foreach ($series as $key => $value) {
                $series[$key]->serieinfo->review = Str::limit($series[$key]->serieinfo->review, 100);
            }
             $typegroup = DB::table('serieinfos')
                     ->select('type')
                     ->groupBy('type')
                     ->get();
               $yeargroup = DB::table('serieinfos')
                     ->select('year')
                     ->groupBy('year')
                     ->get();       
        return view('frontend.serie',compact('series','serieinfos','typegroup','yeargroup'));
       
    }
    public function serie_detail($id)
    {
        $serie = Serie::find($id);
        $serie->actors;
        $serie->serieinfo;
        $serie->link;
        $serie['img_url'] = url('backendtemplate/serieImg/' . $serie->photo);
        return view('frontend.serie_detail', compact('serie'));
    }
}
