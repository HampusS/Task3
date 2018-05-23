<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function stores(){
    return $this->belongsToMany('Store');
  }

  public function reviews(){
    return $this->hasMany('Review');
  }
}
