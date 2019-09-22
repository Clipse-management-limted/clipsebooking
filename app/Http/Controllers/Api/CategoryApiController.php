<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\CategoriesResource;

class CategoryApiController extends Controller
{
  // public $masterController;

  public function  __construct()
  {
      // $this->$masterController= new CategoryMasterController();
  }
  public function index()
  {
    $resource =  Category::all();
   return CategoriesResource::collection($resource);
  // $resource =  $this->$masterController->index();
  // return new CategoriesResource($resource);
  }

  public function show($id)
  {
      $category =  Category::findOrFail($id);
      $post =$category->post;
      return  PostResource::collection($post);

  }


}
