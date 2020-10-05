<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
     protected $fillable = [
        'rating', 'duration','review','type','quality','year','movie_id',
    ];
    public function movie(){
    	return $this->belongsTo('App\Movie');
    }
}
