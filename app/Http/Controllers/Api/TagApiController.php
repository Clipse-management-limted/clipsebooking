<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class TagApiController extends Controller
{
  public function index()
  {
     $users= Tag::paginate();
     return TagResource::collection($users);
  }
  public function posts($id)
  {
      $tag = Tag::findorfail($id);
      $post = $tag->post;
      return PostResource::collection($post);
  }
}
