<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostApiController extends Controller
{
  public function index()
  {
    $resource =   Post::with(['author','image','video','category','tag'])->paginate();
   return  PostResource::collection($resource);
  }

  public function show($id)
  {


  }
}
