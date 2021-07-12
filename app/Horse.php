<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Horse extends Model
{

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function color(){
        return $this->belongsTo('App\Color');
    }
    public function line(){
        return $this->belongsTo('App\Line');
    }

}
