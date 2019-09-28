@extends('layouts.app')
@section('content')

<!-- Section - Pricing Start -->
          <section id="pricing" class="bg-img-cover bg-overlay-7">
              <div class="container">
                              <div class="row">
                  <!-- <div class="row justify-content-center justify-content-lg-between"> -->
                      <!-- <div class="col-md-6 col-lg-7 col-xl-6 text-center text-md-left">
                          <h5 class="font-weight-bold letter-spacing-2 text-uppercase text-white">Everything You Need In One Place</h5>
                          <span class="d-block font-alt font-weight-bold h1 mt-3 text-white">The best way to predict the future is to create it.</span>
                          <span class="bg-secondary mt-4 mx-auto mx-md-0 sep-line-extra-thick-long"></span>
                      </div> -->
                      <!-- //.col-md-6 -->
                        @if ($foods->count() > 0 )
   @foreach ($foods as $user)
                      <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4 mt-5 mt-md-0">
                          <div class="card card-pricing shadow-lg">
                              <div class="card-header bg-white border-0 pb-4 pt-5 text-center">
                                  <h4 class="font-weight-bold letter-spacing-2 text-uppercase">{{$user->food_name}}</h4>
                 <img class="card-img-top" src="{{url('storage/public/food/thumbnail/'.$user->food_name.'.png')}}" alt="{{$user->food_name}}">
                                  <!-- <div class="price mt-5">
                                      <span class="price-currency font-alt font-weight-bold position-relative text-extra-large">$</span>
                                      <span class="price-number font-alt font-weight-bold">49</span>
                                      <span class="price-decimal font-alt font-weight-bold position-relative text-extra-large">99</span>
                                      <span class="d-block font-weight-bold letter-spacing-2 mt-2 text-gray-600 text-small text-uppercase">Billed Monthly</span>
                                  </div> -->
                                  <!-- <div class="price mt-5">
                                     <h4>#{{$user->price}}</h4>
                                      <!-- <span class="price-currency font-alt font-weight-bold position-relative text-extra-large">#</span>
                                      <span class="price-number font-alt font-weight-bold"></span> -->

                                  <!--   </div> -->
                                  <!-- //.price -->
                              </div>
                              <!-- //.card-header -->

                              <!-- <span class="bg-secondary font-weight-bold letter-spacing-2 p-2 text-center text-small text-uppercase text-white">Price in US Dollars</span> -->

                              <div class="card-body pb-5 pt-4 px-5">
                                <form   method="POST" action="{{route('buy_food') }}">
                                     @csrf

                                <!--Text-->
                                <div class="row">
                                  <div class="col-md-5">
                                    <div class="form-group fg-line">
                                       <label for="Name">Quantity</label>
                                       <input type="number" class="form-control input-sm" id="num_of_order"  name="num_of_order" placeholder="Enter Number Order">
                                       <input type="hidden" class="form-control input-sm" value="{{$user->food_name}}" id="foodName" name="foodName" >

                                   </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group fg-line">
                                       <label for="Name">price</label>
                                         <input type="text" disabled value="#{{$user->price}}" class="form-control input-sm" id=""  name="" >
                                         <input type="hidden" class="form-control input-sm" id="pricekobo"  name="pricekobo" value="{{$user->price}}00">
                                           <input type="hidden" class="form-control input-sm" id="price"  name="price" value="{{$user->price}}">
                                   </div>
                                  </div>
                                </div>
                                <div class="panel-group" id="accordion">
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                       <a class="btn btn-primary btn-sm m-t-10" data-toggle="collapse" data-parent="#accordion" href="#collapse1_{{$user->id}}">
                                          Complete Order</a>
                                              <!-- <button type="button" class="btn btn-light-blue btn-md">Proceed To Checkout</button> -->

                                      </h4>
                                    </div>
                                    <div id="collapse1_{{$user->id}}" class="panel-collapse collapse in">
                                      <div class="panel-body">

                                           <div class="form-group fg-line">
                                              <label for="Name">Full Name</label>
                                                 <input type="hidden" class="form-control input-sm" value="food" id="food" name="food" >
                                              <input type="text" class="form-control{{ $errors->has('Name') ? ' is-invalid' : '' }} input-sm" value="{{ old('Name') }}" id="Name" name="Name" placeholder="Enter full name">
                                              @if ($errors->has('Name'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong style="color:red">{{ $errors->first('Name') }}</strong>
                                              </span>
                                              <br/>
                                              @endif
                                          </div>
                                          <div class="form-group fg-line">
                                              <label for="Phone">Phone NUmber</label>
                                              <input type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} input-sm" value="{{ old('phone') }}" id="phone" name="phone" placeholder="Enter Phone Number">
                                              @if ($errors->has('phone'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong style="color:red">{{ $errors->first('phone') }}</strong>
                                              </span>
                                              <br/>
                                              @endif
                                          </div>
                                          <div class="form-group fg-line">
                                              <label for="Email1">Email address</label>
                                              <input type="email" class="form-control{{ $errors->has('Email1') ? ' is-invalid' : '' }} input-sm" value="{{ old('Email1') }}" id="Email1" name="Email1" placeholder="Enter email">
                                              @if (session('serrortatus'))

                                                            <div class="alert alert-danger">
                                                                {{ session('serrortatus') }}
                                                            </div>
                                                        @endif
                                                 @if ($errors->has('Email1'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong style="color:red">{{ session('Email1') }}{{ $errors->first('Email1') }}</strong>
                                              </span>
                                              <br/>
                                              @endif
                                          </div>
                                          <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                          <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}

                                            <button type="submit" value="Pay Now!" class="btn btn-primary btn-sm m-t-10">Pay Now!</button>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->

                    </form>
                                  <!-- <ul class="font-weight-bold list-checkmark list-checkmark-primary list-unstyled text-medium">
                                      <li class="my-1">Free Lifetime Updates</li>
                                      <li class="my-1">Cancel Any Time</li>
                                      <li class="my-1">Secure Payments</li>
                                      <li class="my-1">24/7 Customer Support</li>
                                      <li class="my-1">Clear Documentation</li>
                                  </ul> -->


                              </div>
                              <!-- //.card-body -->

                          </div>
                          <!-- //.card -->
                      </div>
                            @endforeach
                      <!-- //.col-sm-9 -->

                      @else
                         <div class="alert alert-warning">
                              <strong>Sorry!</strong> No Available Events .....
                          </div>
                      @endif
                  </div>
                  <!-- //.row -->
              </div>
              <!-- //.container -->
              <br /><br /><br /><br /><br /><br /><br /><br /><br />
          </section>
          <!-- //Section - Pricing End -->




@endsection
