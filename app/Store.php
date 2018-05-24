<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Store;
use App\ProductStore;
use App\Review;

class Store extends Model
{
  public function products(){
    return $this->hasMany('App\Product');
  }
}
