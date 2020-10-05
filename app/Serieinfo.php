<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serieinfo extends Model
{
    protected $fillable = [
        'rating', 'duration','review','type','quality','year','season_no','episode_no','link_id','serie_id'
    ];
     public function serie(){
    	return $this->belongsTo('App\Serie');
    }
    public function link(){
    	return $this->belongsTo('App\Link');
    }
}
