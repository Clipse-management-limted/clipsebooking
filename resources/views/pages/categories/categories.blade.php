@extends('layouts.app')
@section('content')
<section id="content">
              <div class="container c-alt">

                  <div class="text-center">
                      <h2 class="f-400"></h2>
                      <div class="card-body">
                          <form method="POST" action="{{ route('save-category') }}">
                              @csrf

                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                  <div class="col-md-6">
                                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus required>

                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="category_color" class="col-md-4 col-form-label text-md-right">{{ __('Category Color') }}</label>

                                  <div class="col-md-6">
                                      <input id="category_color" type="color" class="form-control @error('category_color') is-invalid @enderror" name="category_color" value="{{ old('category_color') }}" required autocomplete="category_color" autofocus required>

                                      @error('category_color')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>



                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Register') }}
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>

                  <div class="clearfix"></div>

                  <div class="row m-t-25">
                    @foreach ($categories as $key => $value)
                      <div class="col-sm-4">
                          <div class="card pt-inner">
                              <div class="pti-header bgm-amber">
                                  <h2>{{$value->title}} <small>| </small></h2>
                                  <div class="ptih-title" style="background-color:{{$value->color}}">Banana Pack</div>
                              </div>

                              <div class="pti-body">
                                  <div class="ptib-item">
                                      Pellentesque habitant morbi tristique senectus et netusmalesuada fames ac turpis egestas. Suspendisse maximus imperdiet tristique.
                                  </div>
                                  <div class="ptib-item">
                                      In dapibus ipsum sit amet leo
                                  </div>
                              </div>

                              <div class="pti-footer">
                                  <a href="#" class="bgm-amber"><i class="zmdi zmdi-check"></i></a>
                              </div>
                          </div>
                      </div>
                      @endforeach


                  </div>
              </div>

          </section>


@endsection
