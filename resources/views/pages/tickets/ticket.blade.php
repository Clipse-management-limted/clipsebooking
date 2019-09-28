@extends('layouts.app')
@section('content')



<!-- Section - Contact Start -->
<section id="contact" class="border-top">
<div class="container">


<div class="row justify-content-between">
    <div class="col-md-10 col-lg-8 mx-auto text-center">
  <div class="col-lg-10 col-lg-offset-2">
                         @if (session('status'))

                                       <div class="alert alert-danger">
                                           {{ session('status') }}
                                       </div>
                                   @endif


                         </div>
                         <div class="card">
                                        <div class="card-header">
                                            <h2>Festival<small>PURCHASE FESTIVAL TICKETS
                 </small></h2>
                                        </div>

                      <div class="card-body card-padding">

                            <h3 class="font-weight-bold"></h3>
                            <span class="bg-secondary mt-3 sep-line-thick"></span>

                            <form   method="POST" action="{{route('buy_ticket') }}">
                              @csrf
                                 <div class="form-group fg-line">
                                    <label for="Name">Full Name</label>
                                        <input type="hidden" class="form-control input-sm" value="{{$id}}" id="event_id" name="event_id" >
                                    <input type="hidden" class="form-control input-sm" value="ticket" id="food" name="food" >
                                    <input type="text" class="bg-gray-200 form-control{{ $errors->has('Name') ? ' is-invalid' : '' }} input-sm" value="{{ old('Name') }}" id="Name" name="Name" placeholder="e.g. Wiro Sableng">
                                    @if ($errors->has('Name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $errors->first('Name') }}</strong>
                                    </span>
                                    <br/>
                                    @endif
                                </div>
                                <div class="form-group fg-line">
                                    <label for="Phone">Phone NUmber</label>
                                    <input type="number" class="bg-gray-200 form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} input-sm" value="{{ old('phone') }}" id="phone" name="phone" placeholder="e.g. 08127846543">
                                    @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $errors->first('phone') }}</strong>
                                    </span>
                                    <br/>
                                    @endif
                                </div>
                                  <div class="form-group fg-line">
                                      <label for="Email1">Email address</label>
                                      <input type="email" class="bg-gray-200 form-control{{ $errors->has('Email1') ? ' is-invalid' : '' }} input-sm" value="{{ old('Email1') }}" id="Email1" name="Email1" placeholder="e.g. wirosableng@gmail.com">
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
                                     <select class="bg-gray-200 form-control{{ $errors->has('tickect_name') ? ' is-invalid' : '' }} input-sm" id="tickect_name" name="tickect_name" required>
                                       <option disabled>   Select Ticket  </option>
                                      <option>   Select Ticket  </option>
                                        @if ($TICKECT->count() > 0 )
                                        @foreach ($TICKECT as $user)
                                        <option value="{{$user->id}}">{{$user->ticket_name}} </option>
                                        @endforeach
                                        @else
                                          <option >   <div class="alert alert-warning">
                                                <strong>Sorry!</strong> No Available Tickets For This Events .....
                                            </div></option>
                                        @endif

                                       <!-- <option>   Select Ticket  </option>
                                       <option value="Gold">   Gold     #5000  </option>
                                       <option value="Regular">Regular  #2500  </option>
                                       <option value="Premium">Premium  #10000  </option> -->
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
                                    <input type="text" class="bg-gray-200 form-control{{ $errors->has('num_ticket') ? ' is-invalid' : '' }} input-sm" id="num_ticket"  name="num_ticket" placeholder="e.g 2 or 3 or 7">
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
                            @if ($TICKECT->count() > 0 )
                                  <button type="submit" value="Pay Now!" class="btn btn-primary btn-sm m-t-10">Pay Now!</button>
                                @else

  <button type="submit" value="Pay Now!" class="btn btn-primary btn-sm m-t-10" disabled>Pay Now!</button>
                                   @endif
                                  <!-- <button type="submit" class="btn btn-primary btn-sm m-t-10">Submit</button> -->
                            </form>

</div>
<!-- //.row -->
</div>
</div>
</div>
</div>
<!-- //.container -->
</section>

@endsection
