<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function horse(){
        return $this->hasMany('App\Horse');
    }
}
