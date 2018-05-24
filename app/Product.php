<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Store;
use App\ProductStore;
use App\Review;

class Product extends Model
{
  public function stores(){
    return $this->belongsToMany('App\Store');
  }

  public function reviews(){
    return $this->hasMany('App\Review');
  }
}
