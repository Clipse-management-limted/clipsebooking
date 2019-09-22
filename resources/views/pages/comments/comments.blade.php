@extends('layouts.app')
@section('content')

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
      </h1>

      <!-- Blog Post -->
          @foreach ($comments as $key => $value)
      <div class="card mb-4">
        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">{{$value->post->title}}</h2>
          <p class="card-text">{{$value->content}}!</p>
          <a href="{{$value->post->link()}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted on {{$value->created_at}} by {{$value->author->name}}
          <a href="#">Start Bootstrap</a>
        </div>
      </div>
        @endforeach


      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="{{$comments->links()}}"></a>
        </li>
        <!-- <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li> -->
      </ul>
      <!-- <div class="col-md-12">
        <ul class="pagination justify-content-center mb-4">
  <li class="page-item">
  <a class="page-link" href="{{$comments->links()}}">← Older</a>
  </li>
  </ul>

      </div> -->

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
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
