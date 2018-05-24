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
      justify-content: center;
      text-align: center;
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
                          <div class="card-header"><h2>Create Your Product</h2></div>
                              <div class="col-sm-6 cent-box">
                                  <form action="{{ route('products.store') }}" method="POST">
                                    @csrf
                                      <div class="form-group">
                                          <label for="exampleTextarea">Product Name</label>
                                          <div class="col-12">
                                              <input class="form-control" type="text" value="" name="name">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleTextarea">Brand</label>
                                          <div class="col-12">
                                              <input class="form-control" type="text" value="" name="brand">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleTextarea">Link Picture</label>
                                          <div class="col-12">
                                              <input class="form-control" type="url" placeholder="https://randomurltoimage.com" name="image">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleTextarea">Price</label>
                                          <div class="col-12">
                                              <input class="form-control" type="text" value="" name="price">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        @foreach($stores as $store)
                                          <div class="form-check form-check-inline">
                                              <label class="form-check-label">
                                                  <input class="form-check-input" type="checkbox" value="{{$store->id}}" name="stores[]"> {{$store->name}}
                                              </label>
                                          </div>
                                          @endforeach
                                          <div class="form-group">
                                              <label for="exampleTextarea">Description</label>
                                              <textarea class="form-control" id="exampleTextarea" rows="3" name="description"></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <button type="submit" class="btn btn-primary">Add Product</button>
                                      </div>
                                </form>
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
