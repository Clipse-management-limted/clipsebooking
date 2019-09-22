<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function index()
  {
    return view('pages.comments.comments')->with([
      'comments' =>  Comment::with((['author','post']))->paginate(),
        'categories' =>  Category::all()

    ]);
  }

  public function show($id)
  {
    return view('pages.comments.comment')->withcomment(Comment::findOrFail($id));
  }


}
