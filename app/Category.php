<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = ['name'];  //htae ko htae pay ya ml


 public function posts()
    {
        return $this->hasMany('App\Post');
    }
}