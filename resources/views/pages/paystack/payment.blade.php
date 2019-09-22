@extends('layouts.app')
@section('content')







<!-- Signup Section -->
<section id="signup" class="signup-section">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-lg-8 mx-auto text-center">
        <div class="col-lg-10 col-lg-offset-2">
                               @if (session('status'))

                                             <div class="alert alert-success">
                                                 {{ session('status') }}
                                             </div>
                                         @endif



                               </div>
        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
        <h2 class="text-white mb-5">Buy Ticket!</h2>
        <div class="card">
                       <div class="card-header">
                           <h2>Card Payment<small>  Jim Jim event Ticket  ₦ 2,950
</small></h2>
                       </div>

                       <div class="card-body card-padding">
                         <form   method="POST" action="{{route('pay') }}">
                           @csrf
                              <div class="form-group fg-line">
                                 <label for="Name">Email</label>
                                 <input type="email" value="{{ session('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-sm" id="email" name="email" >
                                 @if ($errors->has('email'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong style="color:red">{{ $errors->first('email') }}</strong>
                                 </span>
                                 <br/>
                                 @endif
                             </div>
                             <div class="form-group fg-line">
                                 <label for="Phone">User Id</label>
                                 <input type="number" value="{{ session('user_id') }}" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }} input-sm" id="user_id" name="user_id" >
                                 @if ($errors->has('user_id'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong style="color:red">{{ $errors->first('user_id') }}</strong>
                                 </span>
                                 <br/>
                                 @endif
                             </div>
                               <div class="form-group fg-line">
                                   <label for="Email1">Amount</label>
                                   <input type="text" value="{{ session('amount') }}" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }} input-sm" id="amount" name="amount" >
                                   @if ($errors->has('amount'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong style="color:red">{{ $errors->first('amount') }}</strong>
                                   </span>
                                   <br/>
                                   @endif
                               </div>

                               <div class="form-group fg-line">
                                  <label for="Name">Tickets Type</label>
                                  <input type="text" value="{{ session('tickect_name') }}" disabled class="form-control{{ $errors->has('tickect_name') ? ' is-invalid' : '' }} input-sm" id="tickect_name" name="tickect_name" >
                                  @if ($errors->has('tickect_name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong style="color:red">{{ $errors->first('tickect_name') }}</strong>
                                  </span>
                                  <br/>
                                  @endif
                              </div>

                              <div class="form-group fg-line">
                                 <label for="Name">Number Of Ticket</label>
                                 <input type="text" value="{{ session('num_ticket') }}" disabled class="form-control{{ $errors->has('num_ticket') ? ' is-invalid' : '' }} input-sm" id="num_ticket" name="num_ticket" >
                                 @if ($errors->has('num_ticket'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong style="color:red">{{ $errors->first('num_ticket') }}</strong>
                                 </span>
                                 <br/>
                                 @endif
                             </div>
                             <!-- <input type="text" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" >-->
                              {{-- For other necessary things you want to add to your payload. it is optional though --}}
                             <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                             <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}

                               <button type="submit" value="Pay Now!" class="btn btn-primary btn-sm m-t-10">Pay Now!</button>
                           </form>
                       </div>
                   </div>

      </div>
    </div>
  </div>
</section>





@endsection
