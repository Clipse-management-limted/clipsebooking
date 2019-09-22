@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12 mb-2 mt-2">
<div class="card">
  <div class="card-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ route('save-post') }}" enctype="multipart/form-data">
            @csrf
                         <div class="card-header">
                             <h2>Horizontal Form <small>Use Bootstrap's predefined grid classes to align labels and groups of form controls in a horizontal layout by adding '.form-horizontal' to the form. Doing so changes '.form-groups' to behave as grid rows, so no need for '.row'.</small></h2>
                         </div>

                         <div class="card-body card-padding">
                             <div class="form-group">
                                 <label for="post_title" class="col-sm-2 control-label">Post Title</label>
                                 <div class="col-sm-10">
                                     <div class="fg-line">
                                         <input type="text" class="form-control input-sm @error('post_title') is-invalid @enderror" value="{{old('post_title')}}" id="post_title" name="post_title" placeholder="Post Title" required>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="post_content" class="col-sm-2 control-label">Post Content</label>
                                 <div class="col-sm-10">

                                     <div class="fg-line">
                                         <textarea  class="form-control input-sm @error('post_content') is-invalid @enderror" value="{{old('post_content')}}" id="post_content" name="post_content" placeholder="Post Content" cols="30" rows="10"> </textarea>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                    <p class="c-black f-500 m-b-20" for="post_category">Post Category</p>

                                    <div class="form-group">
                                        <div class="fg-line">
                                            <div class="select">
                                                <select class="form-control" name="post_category" id="post_category" required>
                                                    <option>Select an Option</option>
                                                  @<?php foreach ($category as $key => $value): ?>
                                                    <option value="{{$value->id}}">{{$value->title}}</option>

                                                  <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                       <p class="c-black f-500 m-b-20" for="post_tag">Post Tags</p>

                                       <div class="form-group">
                                           <div class="fg-line">
                                               <div class="select">
                                                   <select class="form-control" name="post_tag[]" id="post_tag[]" required multiple>
                                                       <option>Select an Option</option>
                                                     @<?php foreach ($tags as $key => $value): ?>
                                                       <option value="{{$value->id}}">{{$value->title}}</option>

                                                     <?php endforeach; ?>
                                                   </select>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-sm-6">
                                          <p class="c-black f-500 m-b-20" for="post_tag">Post Images</p>

                                          <div class="form-group">
                                              <div class="fg-line">

                                                      <input type="file" class="form-control" name="post_img[]" id="post_img[]"  multiple>

                                              </div>
                                          </div>
                                      </div>
                             <div class="form-group">
                                 <div class="col-sm-offset-2 col-sm-10">
                                     <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                 </div>
                             </div>
                         </div>
                     </form>

  </div>
    </div>
    </div>
      </div>

          @endsection
