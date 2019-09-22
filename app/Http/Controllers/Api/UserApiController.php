<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\PostResource;

class UserApiController extends Controller
{
  public function index()
  {
     $users= User::paginate();
     return UserResource::collection($users);
  }
  public function posts($id)
  {
      $author = User::findorfail($id);
      $post = $author->posts;
      return PostResource::collection($post);
  }

}
