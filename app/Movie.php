<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
     protected $fillable = [
        'name','photo','link_id'
    ];
    public function extra(){
    	return $this->hasOne('App\Extra');
    }
    public function link(){
    	return $this->belongsTo('App\Link');
    }
    public function actors(){
    	return $this->belongsToMany('App\Actor');
    }
}
