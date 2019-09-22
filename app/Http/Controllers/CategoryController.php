<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;

class CategoryController extends Controller
{
  public function index()
  {
    return view('pages.categories.categories')->with([
      'categories' =>  Category::all()
    ]);
  }

  public function show($id)
  {
    return view('pages.categories.category')->with([
      'category' =>  Category::findOrFail($id)
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' =>'required',
      'category_color' => 'required'
    ]);

    $category = new Category();
    $category->title = $request->get('name');
    $category->color = $request->get('category_color');
    $category->save();
    return redirect()->back()->with('message','Category Created .....');
  }
}
