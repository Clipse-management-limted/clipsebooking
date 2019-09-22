@extends('layouts.app')
@section('content')


<!-- Signup Section -->
<section id="signup" class="signup-section">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-lg-8 mx-auto text-center">
        <div class="col-lg-10 col-lg-offset-2">
                               @if (session('status'))

                                             <div class="alert alert-danger">
                                                 {{ session('status') }}
                                             </div>
                                         @endif


                               </div>
        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
        <h2 class="text-white mb-5">Buy Ticket!</h2>
        <div class="card">
                       <div class="card-header">
                           <h2>Festival<small>PURCHASE FESTIVAL TICKETS
</small></h2>
                       </div>

                       <div class="card-body card-padding">
                         <form   method="POST" action="{{route('buy_ticket') }}">
                           @csrf
                              <div class="form-group fg-line">
                                 <label for="Name">Full Name</label>
                                                               <input type="hidden" class="form-control input-sm" value="ticket" id="food" name="food" >
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

                               <div class="form-group fg-line">
                                  <label for="Name">Tickets Type</label>
                                  <select class="form-control{{ $errors->has('tickect_name') ? ' is-invalid' : '' }} input-sm" id="tickect_name" name="tickect_name" required>
                                    <option disabled>   Select Ticket  </option>
                                    <option>   Select Ticket  </option>
                                    <option value="Gold">   Gold     #5000  </option>
                                    <option value="Regular">Regular  #2500  </option>
                                    <option value="Premium">Premium  #10000  </option>
                                  </select>
                                  @if ($errors->has('tickect_name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong style="color:red">{{ $errors->first('tickect_name') }}</strong>
                                  </span>
                                  <br/>
                                  @endif
                              </div>

                              <div class="form-group fg-line">
                                 <label for="Name">Number Of Ticket</label>
                                 <input type="text" class="form-control{{ $errors->has('num_ticket') ? ' is-invalid' : '' }} input-sm" id="num_ticket"  name="num_ticket" placeholder="Enter Number Of Ticket To Buy">
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

                               <!-- <button type="submit" class="btn btn-primary btn-sm m-t-10">Submit</button> -->
                           </form>
                       </div>
                   </div>

      </div>
    </div>
  </div>
</section>


@endsection
