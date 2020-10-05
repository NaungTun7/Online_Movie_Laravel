<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
	Route::get('/','FrontendController@home')->name('homepage');
  Route::get('/serie','FrontendController@serie')->name('serie');
	Route::get('/dcma','FrontendController@dcma')->name('dcma');
	Route::get('/movie_detail/{id}','FrontendController@movie_detail')->name('movie_detail');	
    Route::get('/serie_detail/{id}','FrontendController@serie_detail')->name('serie_detail'); 
     Route::resource('extras','ExtraController');
      Route::resource('links','LinkController');
       Route::resource('movies','MovieController');
        Route::resource('series','SerieController');
         Route::resource('serieinfos','SerieinfoController');
         Route::resource('months','MonthController');
         Route::resource('ads','AdController');
         Route::resource('facebooks','FacebookController');
          Route::resource('comments','CommentController');
          Route::resource('actors','ActorController');
           Route::resource('assignactors','AssignActorController');
           Route::resource('assignseries','AssignSerieController');
Route::get('login/facebook', 'SocialAuthController@redirectToProvider')->name('loginFb');
Route::get('login/facebook/callback', 'SocialAuthController@handleProviderCallback');
Route::get('/search','FrontendController@search');
 // Auth::routes();
Route::get('destroysession', function(){
  session()->flush();
  return back();
});
//Route::get('/index', 'ExtraController@index')->name('index');
Route::get('/search', function (Request $request) {
    return App\Models\Movie::search($request->search)->get();
});