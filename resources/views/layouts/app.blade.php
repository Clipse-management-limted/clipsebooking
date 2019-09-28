<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="{{ asset('assets/ui/css/bootstrap.min.css') }}">

          <!-- Font Awesome CSS -->
          <link rel="stylesheet" href="{{ asset('assets/ui/css/fontawesome-all.min.css') }}">

          <!-- Include all css plugins (below), or include individual files as needed -->
          <link rel="stylesheet" href="{{ asset('assets/ui/css/magnific-popup.css') }}">

          <!-- Theme CSS -->
          <link rel="stylesheet" href="{{ asset('assets/ui/css/theme.min.css') }}">
          <link rel="stylesheet" href="{{ asset('assets/ui/css/styles.css') }}">
    <!-- Bootstrap core CSS -->
    <!-- <link href="{{ asset('assets/ui/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->

    <!-- Custom fonts for this template -->
    <!-- <link href="{{ asset('assets/ui/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <!-- <link href="{{ asset('assets/ui/css/grayscale.css') }}" rel="stylesheet"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>

<body id="page-top" data-preloader-color="bg-secondary">
       <div id="app">
     <!-- Header Start -->
     <header class="fixed-top">
         <div class="container h-100">
             <div class="row align-items-center h-100 no-gutters">
                 <div class="col-xl-2">
                     <div class="navbar-header align-items-center d-flex">
                         <a href="{{ url('/') }}" class="navbar-brand m-0 page-scroll">
                             <img src="{{ url('img/IMG-20190926-WA0002.jpg') }}" alt="" class="logo-text-dark"/>
                             <img src="{{ url('img/IMG-20190926-WA0002.jpg') }}" alt="" class="logo-text-light"/>
                         </a>

                         <button class="navbar-toggler border d-xl-none" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation">
                             <span class="navbar-toggler-icon"></span>
                         </button>
                     </div>
                     <!-- //.navbar-header -->
                 </div>
                 <!-- //.col-xl-2 -->

                 <div class="col-xl-8">
                     <nav id="navigation" class="navbar navbar-expand-xl p-0">
                         <div class="navbar-collapse collapse d-xl-flex justify-content-xl-center" id="navbar-header">
                             <ul class="navbar-nav">
                                 <li class="nav-item">
                                     <a href="{{ route('tickets') }}" class="nav-link page-scroll"> <h3>Buy Tickets</h3></a>
                                 </li>
                                 <!-- <li class="nav-item">
                                     <a href="{{ route('packing') }}" class="nav-link page-scroll">Packing Reservation</a>
                                 </li> -->
                                 <li class="nav-item">
                                     <a href="{{ route('food') }}" class="nav-link page-scroll"><h3>Food Reservation</h3></a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="{{ route('contact-us') }}" class="nav-link page-scroll"><h3>Contact Us</h3></a>
                                 </li>
                                 <!-- <li class="nav-item">
                                     <a href="#" class="nav-link page-scroll">Services</a>
                                 </li> -->
                                 @guest
                                       <!-- <li class="nav-item">
                                           <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                       </li> -->
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

                             <!-- <div class="d-flex d-xl-none form-inline ml-xl-5 py-4 py-xl-0">
                                 <a href="#contact" class="btn btn-primary btn-shadow page-scroll">Contact Us</a>
                             </div> -->
                             <!-- //.d-flex -->
                         </div>
                         <!-- //.navbar-collapse -->
                     </nav>
                 </div>
                 <!-- //.col-xl-8 -->

                 <!-- <div class="col-xl-2 d-none d-xl-block">
                     <div class="d-flex justify-content-end">
                         <a href="#contact" class="btn btn-primary btn-shadow page-scroll">Contact Us</a>
                     </div>

                 </div> -->
                 <!-- //.col-xl-2 -->
             </div>
             <!-- //.row -->
         </div>
         <!-- //.container -->
     </header>
     <!-- //Header End -->


     <!-- Main Start -->



        <!-- <main class="container"> -->

            @yield('content')
        <!-- </main> -->


      <!-- SCRIPTS -->
      <!-- Footer Start -->
             <footer class="border-top py-5">
                 <div class="container">
                     <div class="row justify-content-between">
                         <div class="col-md-6 text-center text-md-left">
                             <span class="font-weight-bold letter-spacing-2 text-uppercase text-small">&copy; 2019 Centric.NG &mdash; All Rights Reserved</span>
                         </div>
                         <!-- //.col-md-6 -->

                         <div class="col-md-6 mt-3 mt-md-0">
                             <ul class="list-inline-icon text-center text-md-right text-large">
                                 <li class="list-inline-item">
                                     <a href="#"><i class="fab fa-facebook"></i></a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#"><i class="fab fa-twitter"></i></a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#"><i class="fab fa-behance"></i></a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#"><i class="fab fa-instagram"></i></a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#"><i class="fab fa-dribbble"></i></a>
                                 </li>
                             </ul>
                         </div>
                         <!-- //.col-md-6 -->
                     </div>
                     <!-- //.row -->
                 </div>
                 <!-- //.container -->
             </footer>
             <!-- //Footer End -->

         </div>
         <!-- //Main End -->


         <!-- Scroll to top -->
         <a href="#page-top" class="page-scroll scroll-to-top shadow">
             <i class="fas fa-chevron-up"></i>
         </a>


         <!-- jQuery & Bootstrap JS -->
         <script src="{{ asset('assets/ui/js/jquery.min.js') }}"></script>
         <script src="{{ asset('assets/ui/js/bootstrap.bundle.min.js') }}"></script>

         <!-- Include all js plugins (below) -->
         <script src="js/pace.min.js') }}"></script>
         <script src="{{ asset('assets/ui/js/jquery.easing.min.js') }}"></script>
         <script src="{{ asset('assets/ui/js/jquery.inview.min.js') }}"></script>
         <script src="{{ asset('assets/ui/js/jquery.easypiechart.min.js') }}"></script>
         <script src="{{ asset('assets/ui/js/imagesloaded.pkgd.min.js') }}"></script>
         <script src="{{ asset('assets/ui/js/isotope.pkgd.min.js') }}"></script>
         <script src="{{ asset('assets/ui/js/jquery.magnific-popup.min.js') }}"></script>
         <script src="{{ asset('assets/ui/js/jquery.countTo.js') }}"></script>
         <script src="{{ asset('assets/ui/js/jquery.validate.min.js') }}"></script>
         <script src="{{ asset('assets/ui/js/jquery.ajaxchimp.min.js') }}"></script>

         <!-- Theme JS -->
         <script src="{{ asset('assets/ui/js/theme.js') }}"></script>

     </body>

 <!-- Mirrored from themes.lucky-roo.com/segita-v1.1/html/hero-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2019 11:42:03 GMT -->
 </html>
