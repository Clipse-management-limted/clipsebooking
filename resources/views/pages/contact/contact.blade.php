@extends('layouts.app')
@section('content')


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

@endsection
