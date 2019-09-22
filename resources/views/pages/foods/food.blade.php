@extends('layouts.app')
@section('content')
<!-- Contact Section -->
<section class="contact-section bg-black">
  <div class="container">

    <div class="row">
<div class="col-md-5">

  <!-- Card Regular -->
  <div class="card card-cascade">

    <!-- Card image -->
    <div class="view view-cascade overlay">
      <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/men.jpg" alt="Card image cap">
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!-- Card content -->
    <div class="card-body card-body-cascade text-center">

      <div class="col-md-12">
             <form   method="POST" action="{{route('buy_food') }}">
                  @csrf
                <!--Title-->
             <h3 class="card-title">KFC</h3>
             <!--Text-->
             <div class="row">
               <div class="col-md-5">
                 <div class="form-group fg-line">
                    <label for="Name">Quantity</label>
                    <input type="number" class="form-control input-sm" id="num_of_order"  name="num_of_order" placeholder="Enter Number Order">
                    <input type="hidden" class="form-control input-sm" value="KFC" id="foodName" name="foodName" >

                </div>
               </div>
               <div class="col-md-5">
                 <div class="form-group fg-line">
                    <label for="Name">price</label>
                      <input type="text" disabled value="#5000" class="form-control input-sm" id=""  name="" >
                      <input type="hidden" class="form-control input-sm" id="pricekobo"  name="pricekobo" value="500000">
                        <input type="hidden" class="form-control input-sm" id="price"  name="price" value="5000">
                </div>
               </div>
             </div>
             <div class="panel-group" id="accordion">
               <div class="panel panel-default">
                 <div class="panel-heading">
                   <h4 class="panel-title">
                    <a class="btn btn-light-blue btn-md" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                       Complete Order</a>
                           <!-- <button type="button" class="btn btn-light-blue btn-md">Proceed To Checkout</button> -->

                   </h4>
                 </div>
                 <div id="collapse1" class="panel-collapse collapse in">
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
              </div>
    </div>

  </div>
  <!-- Card Regular -->

</div>

</div>

     <div class="social d-flex justify-content-center">
       <a href="#" class="mx-2">
         <i class="fab fa-twitter"></i>
       </a>
       <a href="#" class="mx-2">
         <i class="fab fa-facebook-f"></i>
       </a>
       <a href="#" class="mx-2">
         <i class="fab fa-github"></i>
       </a>
     </div>

   </div>
 </section>








@endsection
