@extends('layouts.app2')
@section('title') Foods  @endsection
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
                  <p class="pull-right"><a href="#" data-toggle="modal" data-target="#create-food-" data-id="" data-url="" class="btn btn-danger create-item" />   <span>Create Food<i class="fa fa-plus"></i></span></a  </p>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>


                      <th>Name</th>
                       <th>Price</th>
                      <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($foods as $user)

                     <tr>
                        <td>{{$user->food_name}}</td>
                        <td>{{$user->price}}</td>
                       <td><a href="#" data-toggle="modal" data-target="#create-item-{{$user->id}}" data-id="{{$user->id}}" data-url="" class="btn btn-danger create-item" />   <span>Ticket Info <i class="fa fa-plus"></i></span></a</td>

                     </tr>

                     @endforeach

                    </tbody>
                    <tfoot>
                      <tr>

                        <th>Name</th>
                         <th>Price</th>
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
              <h4 class="modal-title" id="myModalLabel">Edit Item</h4>

              </div>


              <div class="modal-body">
                <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Compose New Message</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                  <form   enctype="multipart/form-data"  method="POST" action="{{route('create_food_item') }}">
                                    @csrf
                                  <div class="form-group">
                                    <label for="Name">Full Name</label>

                                    <input type="text" class="form-control{{ $errors->has('Name') ? ' is-invalid' : '' }} input-sm" value="{{ old('Name') }}" id="Name" name="Name" placeholder="Enter Food name">
                                    @if ($errors->has('Name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $errors->first('Name') }}</strong>
                                    </span>
                                    <br/>
                                    @endif
                                  </div>

                                  <div class="form-group">
                                    <label for="Name">Food Price</label>

                                    <input type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }} input-sm" value="{{ old('price') }}" id="price" name="price" placeholder="Enter Food Price">
                                    @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $errors->first('price') }}</strong>
                                    </span>
                                    <br/>
                                    @endif
                                  </div>

                                  <div class="form-group">
                                    <div class="btn btn-default btn-file">
                                      <i class="fa fa-paperclip"></i> Attachment
                                      <input type="file" name="attachment" required>
                                    </div>
                                    <p class="help-block">Max. 32MB</p>
                                  </div>
                                   <button type="submit" value="Pay Now!" class="btn btn-primary btn-sm m-t-10">Submit Now!</button>
                                     </form>
                                </div><!-- /.box-body -->
                              </div>
                            </div>



              </div>
              </div>
              </div>

            </div>
</div>


<script>

$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>


@endsection
