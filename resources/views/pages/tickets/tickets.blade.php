@extends('layouts.app')
@section('content')


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
                {{ $Events->links() }}
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Services End -->




@endsection
