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
    .order-box{
      display: flex;
      text-align: center;
      flex-wrap: wrap;
    }
    .centralize{
      align-items: center;
      justify-content: center;
    }
    .marginalize{
      margin: 10px;
    }
    .descend{
      flex-direction: column;
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
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
            <div class="row centralize">
              <div class="card">
                <div class="card-header"><h2>Products</h2></div>
                  <div class="card-body">
                    <div class="row border-bottom centralize">

                      <div class="marginalize">
                          <a href="{{ route('products.create') }}" class="btn btn-outline-primary col-sm-12">Add Product</a>
                      </div>

                    </div>

                    <div class="row centralize descend">
                      @foreach($products as $product)
                        <div class="row marginalize centralize">

                            <form action="{{ route('products.show', ['product' => $product->id]) }}" method="GET">
                              <button type="submit" class="btn btn-outline-dark">{{$product->title}}</button>
                            </form>
                          <form action="{{ route('products.edit', ['product' => $product->id]) }}" method="GET">
                            <button type="submit" class="btn btn-outline-secondary">Edit</button>
                          </form>
                          <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Del</button>
                          </form>
                        </div>
                      @endforeach
                    </div>
                </div>
              </div>
            </main>
          </div>
</body>
</html>
