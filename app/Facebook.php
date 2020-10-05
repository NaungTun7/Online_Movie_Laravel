<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    protected $fillable = [
        'name','photo','fb_id'
    ];
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
}
