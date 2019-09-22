<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
  public function index()
  {
    return view('pages.tags.tags')->with([
      'tags' =>  Tag::all()
    ]);
  }

  public function show($id)
  {
    return view('pages.tags.tag')->with([
      'tag' =>  Tag::findOrFail($id)
    ]);
  }
}
