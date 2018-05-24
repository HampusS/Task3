<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Store;
use App\ProductStore;
use App\Review;

class ProductStore extends Model
{
  protected $table = "product_store";
  public function stores()
  {
    return $table->hasMany('App\Store');
  }
  public function products()
  {
    return $table->hasMany('App\Product');
  }
}
