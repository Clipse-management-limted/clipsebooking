@extends('layouts.app')
@section('content')

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
      </h1>

      <!-- Blog Post -->

<div class="card mb-4">
  <img class="card-img-top" src="" alt="Card image cap">
  <div class="card-body">
    <h2 class="card-title">{{$post->title}}</h2>
    <p class="card-text">{{$post->content}}!</p>
    <a href="" class="btn btn-primary">Read More &rarr;</a>
  </div>
  <div class="card-footer text-muted">
      Posted on {{$post->created_at}} by {{$post->author->name}}
    <a href="#">Start Bootstrap</a>
  </div>
</div>



      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href=""></a>
        </li>
        <!-- <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li> -->
      </ul>
      <!-- <div class="col-md-12">
        <ul class="pagination justify-content-center mb-4">
  <li class="page-item">
  <a class="page-link" href="">← Older</a>
  </li>
  </ul>

      </div> -->

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Gallary</h5>
        <div class="card-body">
          @foreach ($images as $key => $value)
   <img class="img-thumbnail" src="{{asset($value->url)}}" alt="{{$value->id}}"   />
            @endforeach

            @foreach ($videos as $key => $value)
     <img class="img-thumbnail" src="{{$value->url}}" alt="{{$value->id}}"   />
              @endforeach
        </div>
      </div>

      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
              @foreach ($categories as $key => $value)
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">

                <li>
                  <a href="#" style="background-color:{{$value->color}}">{{$value->title}}</a>
                </li>

              </ul>
            </div>
              @endforeach

          </div>
        </div>
      </div>

      <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
          You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
      </div>

    </div>

  </div>
  <!-- /.row -->




          @endsection
