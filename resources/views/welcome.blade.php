@extends('layouts.app')
@section('content')

<style>
.dropbtn {
    background-color: #ff00bf;
    color: white;
    padding: #px;
    font-size: #px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: lightgrey;
    min-width: 60px;
    z-index: 1;
}

.dropdown-content a {
     color: black;
      padding: 8px 54px;
      text-decoration: none;
      display: inline;
}

.dropdown-content a:hover {background-color: white;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: grey;}

/* @media (max-width:767px){
  .dropbtn {
      background-color: black;
      color: white;
      padding: #px;
      font-size: #px;
      border: none;
  }

  .dropdown {
      position: relative;
      display: inline-block;
  }
  .dropdown-content {
      display: none;
      position: absolute;
      background-color: lightgrey;
      min-width: #px;
      z-index: 1;
  }

  .dropdown-content a {
      color: black;
      padding: 5px 8px;
      text-decoration: none;
      display: block;
  }

  .dropdown-content a:hover {background-color: white;}
  .dropdown:hover .dropdown-content {display: block;}
  .dropdown:hover .dropbtn {background-color: grey;}
} */

</style>


<!-- Section - Hero Start -->
          <section id="hero" class="bg-img-cover bg-overlay-7 h-100">
              <div class="container h-100">
                  <div class="row align-items-center h-100">
                      <div class="col-lg-8 col-xl-6 mt-4 pt-5">
                          <span class="font-alt text-white">TOURS & ACCOMODATIONS 12/26 - 1/04</span>
                          <h1 class="font-alt font-weight-bold mt-2 text-extra-large-2 text-md-extra-large-3 text-white">Festival  &mdash; COME EXPERIENCE .</h1>

                          <div class="form-inline mt-5">
                            @if ($Events->count() > 0 )
                            <div class="dropdown">
                            <button class="dropbtn btn btn-secondary btn-shadow page-scroll">PURCHASE FESTIVAL TICKETS Here..</button>
                            <div class="dropdown-content">
                                  @foreach ($Events as $pages)
                                   <a href="{{route('ticket',['id'=>$pages->id])}}">{{$pages->title}}</a>
                            <!-- <a href="{{ route('tickets') }}" class="">PURCHASE FESTIVAL TICKETS Here..</a> -->
                                     @endforeach
                            </div>
                          </div>
                              @else
                                 <div class="alert alert-warning">
                                      <strong>Sorry!</strong> No Available Events .....
                                  </div>
                              @endif






                              <!-- <a href="{{ route('tickets') }}" class="btn btn-secondary btn-shadow page-scroll">PURCHASE FESTIVAL TICKETS Here..</a>
                              <a href="#" data-toggle="modal" data-target="#modal-video" class="btn btn-transparent text-white">Watch The Video <i class="fas fa-play-circle"></i></a> -->
                          </div>
                          <!-- //.form-inline -->
                      </div>
                      <!-- //.col-lg-8 -->
                  </div>
                  <!-- //.row -->
              </div>
              <!-- //.container -->
          </section>
          <!-- //Section - Hero End -->

          <!-- Section - Services Start -->
                  <section id="services">
                      <div class="container">
                          <div class="row justify-content-center mb-5 pb-4">
                              <div class="col-lg-8 col-xl-6 text-center">
                                  <h2 class="font-alt font-weight-bold">Available Events</h2>
                                  <p class="font-weight-bold mt-3 text-gray-600"></p>
                              </div>
                              <!-- //.col-lg-8 -->
                          </div>
                          <!-- //.row -->

                          <div class="row justify-content-center no-gutters-xl">
                      @foreach ($Events as $user)
                              <div class="col-md-6 mt-5 mt-xl-0 position-relative">
                                  <img src="{{url('storage/public/event/'.$user->title.'.jpg')}}" alt="" class="img-fluid"/>

                                  <div class="bg-white h-xl-100 left-xl p-xl-3 position-xl-absolute top-xl w-xl-50">
                                      <div class="d-xl-flex flex-xl-column h-xl-100 justify-content-xl-center p-xl-3">
                                          <h2 class="font-weight-bold mt-3 mt-xl-0">{{$user->title}}</h2>
                                          <p class="font-weight-bold mt-2 text-gray-600">{!! Str_limit($user->description,120,'....')!!}}</p>
                                        <a href="{{route('ticket',['id'=>$user->id])}}" class="btn btn-secondary btn-shadow page-scroll">PURCHASE FESTIVAL TICKETS Here..</a>
                                      </div>
                                      <!-- //.d-xl-flex -->
                                  </div>
                                  <!-- //.bg-white -->
                              </div>
                              <!-- //.col-md-6 -->



                              <!-- //.col-md-6 -->
                              @endforeach
                          </div>
                          <!-- //.row -->

                      </div>
                      <!-- //.container -->
                  </section>
                  <!-- //Section - Services End -->

                  <!-- Section - Contact Start -->
          <section id="contact" class="border-top">
              <div class="container">
                  <div class="row mb-5 pb-4">
                      <div class="col-lg-8 col-xl-6">
                          <span class="font-alt font-weight-bold h1">We are always here to help.</span>
                      </div>
                      <!-- //.col-lg-8 -->
                  </div>
                  <!-- //.row -->

                  <div class="row justify-content-between">
                      <div class="col-lg-6 col-xl-5">
                          <div class="row">
                              <div class="col-md-4 text-center text-md-left">
                                  <img src="images/contact-1.jpg" alt="" class="img-fluid">
                              </div>
                              <!-- //.col-md-4 -->

                              <div class="col-md-8 mt-3 mt-md-0 text-center text-md-left">
                                <h6 class="font-weight-bold letter-spacing-2 text-primary text-uppercase">CENTRIC.NG</h6>
                                <h4 class="font-alt font-weight-bold mt-2">E: clipsemgt@gmail.com</h4>
                                <h4 class="font-alt font-weight-bold mt-2">P: +62 134 445 634</h4>
                                <p class="font-weight-bold mt-2 text-gray-600">Lippo Mall Kemang 3rd Floor, Jl. Pangeran Antasari No. 36P Jakarta Selatan 12950, Indonesia</p>
                                <span class="bg-secondary mt-3 mx-auto mx-md-0 sep-line-thick"></span>
                              </div>
                              <!-- //.col-md-8 -->
                          </div>
                          <!-- //.row -->


                      </div>
                      <!-- //.col-lg-6 -->

                      <div class="col-lg-6 mt-5 mt-lg-0">
                          <h3 class="font-weight-bold">Browse the options below to help us direct your enquiry.</h3>
                          <span class="bg-secondary mt-3 sep-line-thick"></span>
                          <div class="col-lg-10 col-lg-offset-2">
                                                 @if (session('status'))

                                                               <div class="alert alert-danger">
                                                                   {{ session('status') }}
                                                               </div>
                                                           @endif


                                                 </div>
                          <form   method="POST" action="{{route('contact') }}">
                            @csrf
                            <div class="form-group fg-line">
                               <label for="Name">Full Name</label>

                               <input type="hidden" class="form-control input-sm" value="contact" id="food" name="food" >
                               <input type="text" class="bg-gray-200 form-control{{ $errors->has('Name') ? ' is-invalid' : '' }} input-sm" value="{{ old('Name') }}" id="Name" name="Name" placeholder="e.g. Wiro Sableng">
                               @if ($errors->has('Name'))
                               <span class="invalid-feedback" role="alert">
                                   <strong style="color:red">{{ $errors->first('Name') }}</strong>
                               </span>
                               <br/>
                               @endif
                           </div>
                              <!-- //.form-group -->
                               <div class="form-group fg-line">
                                   <label for="Name">Subject</label>


                                   <input type="text" class="bg-gray-200 form-control{{ $errors->has('contactSubject') ? ' is-invalid' : '' }} input-sm" value="{{ old('contactSubject') }}" id="contactSubject" name="contactSubject" placeholder="e.g. Assist">
                                   @if ($errors->has('contactSubject'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong style="color:red">{{ $errors->first('contactSubject') }}</strong>
                                   </span>
                                   <br/>
                                   @endif
                               </div>
                                  <!-- //.form-group -->

                              <div class="form-group fg-line">
                                  <label for="Email1">Email address</label>
                                  <input type="email" class="bg-gray-200 form-control{{ $errors->has('Email1') ? ' is-invalid' : '' }} input-sm" value="{{ old('Email1') }}" id="Email1" name="Email1" placeholder="e.g. wirosableng@gmail.com">
                                 @if ($errors->has('Email1'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong style="color:red">{{ $errors->first('Email1') }}</strong>
                                  </span>
                                  <br/>
                                  @endif
                              </div>
                              <!-- //.form-group -->

                              <div class="form-group">
                                  <label for="c_message" class="font-weight-bold">Message:</label>
                                  <textarea name="c_message" id="c_message" class="bg-gray-200 form-control required" rows="9" placeholder="How can we help?"></textarea>
                                  @if ($errors->has('c_message'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong style="color:red">{{ $errors->first('c_message') }}</strong>
                                   </span>
                                   <br/>
                                   @endif
                              </div>
                              <!-- //.form-group -->

                              <button type="submit" id="btn-form-contact" class="btn btn-primary btn-shadow mt-1">Send Message</button>
                          </form>
                      </div>
                      <!-- //.col-lg-6 -->
                  </div>
                  <!-- //.row -->
              </div>
              <!-- //.container -->
          </section>
          <!-- //Section - Contact End -->

<!-- Header -->
<!-- <header class="masthead">
  <div class="container d-flex h-100 align-items-center">
    <div class="mx-auto text-center">
      <h1 class="mx-auto my-0 text-uppercase">Festival</h1>
        <h2 class="mx-auto my-0 text-uppercase">December 28th, 2019</h2>
        <p>Accra Ghana</p>
           <a href="{{ route('tickets') }}"> <button class="btn btn-primary js-scroll-trigger"> <h3 style="color : white;">PURCHASE FESTIVAL TICKETS </h3></button></a>
      <h2 class="text-white-50 mx-auto mt-2 mb-5">COME EXPERIENCE GHANA<br><br><br> <span class="">TOURS & ACCOMODATIONS 12/26 - 1/04</span></h2>
      <a href="#about" class="btn btn-primary js-scroll-trigger"><h3 style="color : white;">EXPERIENCE GHANA </h3></a>
    </div>
  </div>
</header>

</div> -->
<!-- <div class="col-md-12"> -->
  <!--Carousel Wrapper-->
  <!-- <div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel"> -->
    <!--Indicators-->
    <!-- <ol class="carousel-indicators">
      <li data-target="#video-carousel-example2" data-slide-to="0" class="active"></li>
      <li data-target="#video-carousel-example2" data-slide-to="1"></li>
      <li data-target="#video-carousel-example2" data-slide-to="2"></li>
    </ol> -->
    <!--/.Indicators-->
    <!--Slides-->
    <!-- <div class="carousel-inner" role="listbox"> -->
      <!-- First slide -->
      <!-- <div class="carousel-item active"> -->
        <!--Mask color-->
        <!-- <div class="view"> -->
          <!--Video source-->
          <!-- <video class="video-fluid" autoplay loop muted>
            <source src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4" />
          </video>
          <div class="mask rgba-indigo-light"></div>
        </div> -->

        <!--Caption-->
        <!-- <div class="carousel-caption">
          <div class="animated fadeInDown">
            <h3 class="h3-responsive">Light mask</h3>
          </div>
        </div> -->
        <!--Caption-->
      <!-- </div> -->
      <!-- /.First slide -->

      <!-- Second slide -->
      <!-- <div class="carousel-item"> -->
        <!--Mask color-->
        <!-- <div class="view"> -->
          <!--Video source-->
          <!-- <video class="video-fluid" autoplay loop muted>
            <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4" />
          </video>
          <div class="mask rgba-purple-slight"></div>
        </div> -->

        <!--Caption-->
        <!-- <div class="carousel-caption">
          <div class="animated fadeInDown">
            <h3 class="h3-responsive">Super light mask</h3>
          </div>
        </div> -->
        <!--Caption-->
      <!-- </div> -->
      <!-- /.Second slide -->

      <!-- Third slide -->
      <!-- <div class="carousel-item"> -->
        <!--Mask color-->
        <!-- <div class="view"> -->
          <!--Video source-->
          <!-- <video class="video-fluid" autoplay loop muted>
            <source src="https://mdbootstrap.com/img/video/cube.mp4" type="video/mp4" />
          </video>
          <div class="mask rgba-black-strong"></div>
        </div> -->

        <!--Caption-->
        <!-- <div class="carousel-caption">
          <div class="animated fadeInDown">
            <h3 class="h3-responsive">Strong mask</h3>
          </div>
        </div> -->
        <!--Caption-->
      <!-- </div> -->
      <!-- /.Third slide -->
    <!-- </div> -->
    <!--/.Slides-->
    <!--Controls-->
    <!-- <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> -->
    <!--/.Controls-->
  <!-- </div> -->
  <!--Carousel Wrapper-->
  <!-- <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet,
    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
    mollit anim id est laborum.</p>

</div> -->

@endsection
