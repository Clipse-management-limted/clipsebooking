@extends('layouts.app')
@section('content')


<!-- Section - Pricing Start -->
				 <section id="pricing" class="bg-img-cover bg-overlay-7">
						 <div class="container">
								 <div class="row justify-content-center justify-content-lg-between">
										 <div class="col-md-6 col-lg-7 col-xl-6 text-center text-md-left">
												 <h5 class="font-weight-bold letter-spacing-2 text-uppercase text-white">Payment successful !!!!</h5>
												 <span class="d-block font-alt font-weight-bold h1 mt-3 text-white">We are delighted to inform you that we.</span>
												 <span class="bg-secondary mt-4 mx-auto mx-md-0 sep-line-extra-thick-long"> received your payments..</span>
										 </div>
										 <!-- //.col-md-6 -->

										 <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4 mt-5 mt-md-0">
												 <div class="card card-pricing shadow-lg">
														 <div class="card-header bg-white border-0 pb-4 pt-5 text-center">
																 <h4 class="font-weight-bold letter-spacing-2 text-uppercase">Business Plan</h4>

																 <div class="price mt-5">
																		 <span class="price-currency font-alt font-weight-bold position-relative text-extra-large">$</span>
																		 <span class="price-number font-alt font-weight-bold">49</span>
																		 <span class="price-decimal font-alt font-weight-bold position-relative text-extra-large">99</span>
																		 <span class="d-block font-weight-bold letter-spacing-2 mt-2 text-gray-600 text-small text-uppercase">Billed Monthly</span>
																 </div>
																 <!-- //.price -->
														 </div>
														 <!-- //.card-header -->

														 <span class="bg-secondary font-weight-bold letter-spacing-2 p-2 text-center text-small text-uppercase text-white">Price in US Dollars</span>

														 <div class="card-body pb-5 pt-4 px-5">
																 <ul class="font-weight-bold list-checkmark list-checkmark-primary list-unstyled text-medium">
																		 <li class="my-1">Free Lifetime Updates</li>
																		 <li class="my-1">Cancel Any Time</li>
																		 <li class="my-1">Secure Payments</li>
																		 <li class="my-1">24/7 Customer Support</li>
																		 <li class="my-1">Clear Documentation</li>
																 </ul>

																 <p class="font-weight-bold mt-3 text-center text-gray-600">Lorem Ipsum is simply dummy text of the printing industry.</p>
														 </div>
														 <!-- //.card-body -->

														 <div class="card-footer bg-dark border-0 p-0 text-center">
																 <a href="#contact" class="btn btn-large d-block font-weight-bold page-scroll text-white">Start a Project Now</a>
														 </div>
														 <!-- //.card-footer -->
												 </div>
												 <!-- //.card -->
										 </div>
										 <!-- //.col-sm-9 -->
								 </div>
								 <!-- //.row -->
						 </div>
						 <!-- //.container -->
				 </section>
				 <!-- //Section - Pricing End -->

				 <!--

				 <div class="visible-print text-center">
				 	<h1>Laravel 5.7 - QR Code Generator Example</h1>

				     {!! QrCode::size(250)->generate('ItSolutionStuff.com'); !!}
				 		  <img src={{asset('qrcode/'.$ran.'_qrcode.png')}} width="500px" height="400px" alt="" />

				     <p>example by ItSolutionStuf.com.</p>
				 </div> -->
@endsection
