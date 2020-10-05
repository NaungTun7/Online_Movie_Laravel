<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    
     protected $fillable = [
        'name','ph_no','photo','position','month_id',
    ];
}
