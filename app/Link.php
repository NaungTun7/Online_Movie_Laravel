<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'link_text',
    ];
    public function movie()
    {
    	return $this->hasOne('App\Movie');
    }
     public function serieinfo()
    {
    	return $this->hasOne('App\Serie');
    }
}
