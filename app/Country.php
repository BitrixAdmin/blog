<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded =[];

    public function comments(){
        return $this->hasManyThrough('App\Comment','App\Article');
    }

    public function article(){
        return $this->hasMany('App\Article');
    }
}
