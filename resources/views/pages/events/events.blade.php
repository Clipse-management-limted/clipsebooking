@extends('layouts.app2')
@section('title') Events  @endsection
@section('content')

<style>
@media (min-width: 481px) and (max-width: 767px) {

  .MhideDiv
  {
    display:none;
      visibility: hidden;
  }

}

/*
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/

@media (min-width: 320px) and (max-width: 480px) {

  .MhideDiv
  {
    display:none;
      visibility: hidden;
  }


}
</style>
<div class="row">
  <div class="col-md-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                  <div class="col-lg-10 col-lg-offset-2">
                                         @if (session('status'))

                                                       <div class="alert alert-success">
                                                           {{ session('status') }}
                                                       </div>
                                                   @endif



                                         </div>
                  <p class="pull-right"><a href="#" data-toggle="modal" data-target="#create-food-" data-id="" data-url="" class="btn btn-danger create-item" />   <span>Create Food<i class="fa fa-plus"></i></span></a  </p>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>


                      <th>Title</th>
                       <th class="MhideDiv">description</th>
                       <th class="MhideDiv">venue</th>
                      <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($events as $user)

                     <tr>
                        <td>{{$user->title}}</td>
                          <td>{!!str_limit($user->description,40,'.....')!!}</td>
                          <td>{{$user->venue}}</td>
                       <td><a href="#" data-toggle="modal" data-target="#create-event-{{$user->id}}" data-id="{{$user->id}}" data-url="" class="btn btn-danger create-item" />   <span>Create Tickets<i class="fa fa-plus"></i></span></a</td>
                         <td>
                           <!-- Edit Item Modal -->
                         <div class="modal fade" id="create-event-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                         <div class="modal-dialog" role="document">
                         <div class="modal-content">
                         <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                         <h4 class="modal-title" id="myModalLabel">Edit Item</h4>

                         </div>


                         <div class="modal-body">

                         <!-- Main content -->
                          <section class="invoice">
                            <!-- title row -->
                            <div class="row">
                              <div class="col-xs-12">
                                <h2 class="page-header">
                                  <i class="fa fa-globe"></i> Afrochella, Inc. {{$user->id}}
                                  <small class="pull-right">
                                    <?php
                                   $date = Carbon\Carbon::now();
                                 echo $date->toRfc850String();
                                 ?>
                                </small>
                                </h2>
                              </div><!-- /.col -->
                            </div>
                            <div class="row invoice-info">
                              <div class="col-md-12">
                <form id="" role="form"  method="POST" action="{{route('create_event_ticket')}}">
                      @csrf
<input type="hidden" class="form-control input-sm" value="{{$user->id}}" id="event_id" name="event_id" >
                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                          <div class="col-md-6">
                              <input id="subname[]" type="text" placeholder="Enter Ticket Name...." class="form-control{{ $errors->has('subname') ? ' is-invalid' : '' }}" name="subname[]" value="{{ old('subname') }}" required autofocus>

                              @if ($errors->has('subname'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('subname') }}</strong>
                                  </span>
                              @endif
                          </div>
                            </div>
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Price</label>
                          <div class="col-md-6">
                              <input id="price[]" type="text" placeholder="Enter Ticket Price...." class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price[]" value="{{ old('price') }}" required autofocus>

                              @if ($errors->has('price'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('price') }}</strong>
                                  </span>
                              @endif
                          </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">No of Ticket</label>
                    <div class="col-md-6">
                        <input id="noT[]" type="text" placeholder="Enter Number Of Ticket ...." class="form-control{{ $errors->has('noT') ? ' is-invalid' : '' }}" name="noT[]" value="{{ old('noT') }}" required autofocus>

                        @if ($errors->has('noT'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('noT') }}</strong>
                            </span>
                        @endif
                    </div>
              </div>
                    <div class="form-group row">
                      <div id="cat_fields_{{$user->id}}">

                     </div>
                         </div>

                      <div class="line"></div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">  <!-- <div class="input-group-btn"> -->
                      <button class="btn btn-success" type="button"  onclick="cat_fields({{$user->id}});"> <span class="icon-plus-sign" aria-hidden="true"></span>Add More  </button>
                      </div>  </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="pull-right btn btn-primary btn-block margin-bottom">
                                  Save
                              </button>
                          </div>

                      </div>
                  </form>
                    </div>
                            </div>

                         </div>
                         </div>
                         </div>
                         </td>
                     </tr>

                     @endforeach

                    </tbody>
                    <tfoot>
                      <tr>

                        <th>Title</th>
                         <th class="MhideDiv">description</th>
                          <th class="MhideDiv">venue</th>
                          <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                 <!--  <ul id="pagination" class="pagination-sm"></ul> -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->

                <!-- Edit Item Modal -->
              <div class="modal fade" id="create-food-" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel"></h4>

              </div>


              <div class="modal-body">
                <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Compose New Message</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                  <!-- <h3 class="page-title"></h3> -->
    {!! Form::open(['files'=> true,'method' => 'POST', 'route' => ['create_event_item']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
       Create Event
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start_time', 'Start time*', ['class' => 'control-label']) !!}
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                          {!! Form::date('start_time', old('start_time'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('start_time'))
                        <p class="help-block">
                            {{ $errors->first('start_time') }}
                        </p>
                    @endif
                        </div><!-- /.input group -->
                </div>
            </div>
            <div class="form-group">
              <div class="btn btn-default btn-file">
                <i class="fa fa-paperclip"></i> Attachment
                <input type="file" name="attachment" required>
              </div>
              <p class="help-block">Max. 32MB</p>
            </div>

            <!-- <div class="input-group date" data-provide="datepicker">
  <input class="datepicker" data-date-format="mm/dd/yyyy">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div> -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('venue', 'Venue*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('venue', old('venue'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('venue'))
                        <p class="help-block">
                            {{ $errors->first('venue') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('Submit'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

                                </div><!-- /.box-body -->
                              </div>
                            </div>



              </div>
              </div>
              </div>

            </div>
</div>

@section('javascript')
<script>

//Date range picker
    //  $('#reservation').daterangepicker();
// $('.datepicker').datepicker();
//
// $('.datepicker').datepicker({
//     startDate: '-3d'
// });

// $('.datepicker').datepicker({
//     format: 'mm/dd/yyyy',
//     startDate: '-3d'
// });

$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>


    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

<script >

var room = 1;
function cat_fields(id) {
var cat_fields ='cat_fields_'+id;
// alert(cat_fields);
room++;
var objTo = document.getElementById(cat_fields)
var divtest = document.createElement("div");
divtest.setAttribute("class", "form-group removeclass"+room);
var rdiv = 'removeclass'+room;
divtest.innerHTML = ' <div class="form-group row"> <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>     <div class="col-md-6"> <input type="text" class="form-control" id="subname[]" name="subname[]" value="" placeholder="Enter Ticket Name....">    </div> </div> <div class="form-group row"> <label for="name" class="col-md-4 col-form-label text-md-right">Price</label>     <div class="col-md-6"> <input type="text" class="form-control" id="price[]" name="price[]" value="" placeholder="Enter Ticket Price....">    </div> </div> <div class="form-group row"> <label for="name" class="col-md-4 col-form-label text-md-right">No of Ticket</label>     <div class="col-md-6"> <input type="text" class="form-control" id="noT[]" name="noT[]" value="" placeholder="Enter Number Of Ticket....">    </div> </div> <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_cat_fields('+ room +');"> <span class="icon-minus-sign" aria-hidden="true"></span>Remove </button></div></div></div></div><div class="clear"></div>';

objTo.appendChild(divtest)
}
function remove_cat_fields(rid) {
$('.removeclass'+rid).remove();
}
</script>


@endsection

@endsection
