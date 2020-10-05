<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = [
        'name','photo',
    ];
    public function serieinfo(){
    	return $this->hasOne('App\Serieinfo');
    }
    public function actors(){
    	return $this->belongsToMany('App\Actor');
    }
    
}
