<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    public function horse(){
        return $this->hasMany('App\Horse');
    }
}
