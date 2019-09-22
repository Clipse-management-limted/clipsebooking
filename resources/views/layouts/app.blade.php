<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/ui/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('assets/ui/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/ui/css/grayscale.css') }}" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body id="page-top">
    <div id="app">


      <!--Main Navigation-->
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">Afrochella</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{route('tickets') }}">Tickets</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{route('food') }}">Food</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{route('packing') }}">Packing Space</a>
              </li>

              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
              </li>
              <!-- Authentication Links -->
            @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  <!-- <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li> -->
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

<!--Main Navigation-->


        <!-- <main class="container"> -->

            @yield('content')
        <!-- </main> -->
    </div>

      <!-- SCRIPTS -->

      <!-- Footer -->
      <footer class="bg-black small text-center text-white-50">
        <div class="container">
          Copyright &copy; Your Website 2019
        </div>
      </footer>

      <!-- Bootstrap core JavaScript -->
      <script src="{{ asset('assets/ui/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/ui/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

      <!-- Plugin JavaScript -->
      <script src="{{ asset('assets/ui/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

      <!-- Custom scripts for this template -->
      <script src="{{ asset('assets/ui/js/grayscale.min.js') }}"></script>

</body>
</html>
