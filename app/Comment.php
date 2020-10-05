<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $fillable = [
        'cmtName','facebook_id','movie_id'
    ];
    public function facebook()
    {
    	return $this->belongsTo('App\Facebook');
    }
    public function movie()
    {
    	return $this->belongsTo('App\Movie');
    }
}
