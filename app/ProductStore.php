<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
  public function stores()
  {
    return $this->hasMany('Store');
  }
  public function products()
  {
    return $this->hasMany('Product');
  }
}
