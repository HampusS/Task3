<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Store;
use App\ProductStore;
use App\Review;

class Review extends Model
{
  public function product(){
    return $this->belongsTo("App\Product");
  }
}
