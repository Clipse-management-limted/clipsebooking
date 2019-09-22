@extends('layouts.app')
@section('content')
<ul>
@foreach ($tags as $key => $value)
<li style="">
{{$value->title}}
</li>
@endforeach
</ul>

          @endsection
