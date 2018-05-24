<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    a {
      color: inherit;
      text-decoration:none;
    }
    #card{
      display: flex;
      flex: auto;
    }

    #box{
      display: flex;
      align-items: center;
      text-align: center;
      flex-direction: column;
    }
    .marginalize{
      margin: 10px;
    }
    img {
      max-width: 100%;
      line-height: 25;
      vertical-align: bottom;
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('products.index') }}">Back</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-8">
                      <div class="card">
                          <div class="card-header"><h2>{{ $product->title }}</h2></div>

                          <div class="card-body" id="card">
                            <div class="col-sm-6">
                              <div class="list-group">
                                <h5 class="list-group-item"><b>Product Specifications:</b></h5>
                                <li class="list-group-item">
                                  <b>Brand</b>
                                  <br>
                                  {{ $product->brand }}
                                </li>
                                <li class="list-group-item">
                                  <b>Description</b>
                                  <br>
                                  {{ $product->description }}
                                </li>
                                <li class="list-group-item">
                                  <b>Price</b>
                                  <br>
                                  {{ $product->price }}
                                </li>
                                <li class="list-group-item">
                                  <b>Stores</b>
                                  <br>
                                  @foreach($product->stores as $store)
                                  {{$store->name}} in {{$store->city}}
                                  <br>
                                  @endforeach
                                </li>
                                <li class="list-group-item">
                                  <b>Reviews</b>
                                  <br>
                                  @foreach($reviews as $review)
                                  <div class="form-group">
                                    <label for="exampleTextarea">{{$review->name}} rated {{$review->grade }} out of 5 <br> {{ $review->comment }}</label>
                                  </div>
                                  @endforeach
                                </li>
                              </div>
                            </div>
                            <div class="col-sm-6" id="box">
                              <div class="row marginalize">
                                <img src='{{ $product->image }}' class="rounded" alt="Image not found">
                              </div>
                              <div class="row marginalize">
                                @Auth
                                <form action="{{ route('reviews.store') }}" method="POST">
                                  @csrf
                                  <div class="form-group">
                                    <label for="exampleTextarea"><b>Review</b></label>
                                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="grade">
                                      <option selected>Rate the product..</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
                                      <option value="4">Four</option>
                                      <option value="5">Five</option>
                                    </select>
                                    <textarea class="form-control" id="exampleTextarea" rows="2" name="review" placeholder="Add a review to this product!"></textarea>
                                  </div>
                                  <input class="form-control" type="hidden" value="{{ Auth::user()->name }}" name="name">
                                  <input type="hidden" name="productID" value="{{ $product->id }}" />
                                  <button type="submit" class="btn btn-outline-primary col-sm-12">
                                    Add Review
                                  </button>
                                </form>
                                @else
                                <div class="form-group">
                                  <label for="exampleTextarea"><b>Login to Review</b></label>
                                </div>
                                @endAuth
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
        </main>
    </div>
</body>
</html>
