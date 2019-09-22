<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller 
{
  public function index()
  {
    return view('pages.posts.posts')->with([
      'posts' =>  Post::paginate(),
      'categories' =>  Category::all()
    ]);
  }

  public function show($id)
  {
    $post =Post::findOrFail($id);
    $category =Category::all();
    $images= $post->image;
    $videos =$post->video;

    return view('pages.posts.post')->with([
      'post' =>  $post,
        'categories' =>    $category,
        'images' => $images,
        'videos' =>$videos
    ]);
  }

  public function newpost()
  {
      $tag =  Tag::all();
    $category = Category::all();
    return view('pages.posts.addpost')->with([
      'category'=> $category,
        'tags' =>  $tag
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'post_title' =>'required',
      'post_content' => 'required',
      'post_category' => 'required'
    ]);
    $user =Auth::user();
    $post = new Post();
    $post->title = $request->get('post_title');
    $post->content = $request->get('post_content');
    $post->category_id = $request->get('post_category');
    $post->author_id =$user->id;
    $post->post_type ='text';
    $post->save();
    if($request->get('post_tag')){
      foreach ($request->get('post_tag') as $key => $value) {
    DB::table('post_tag')->insert([
      'post_id'  => $post->id,
      'tag_id'  =>$value
    ]);
      }

    }

        if($request->hasFile('post_img')){
            $counter=0;
            foreach ($request->file('post_img') as $key => $value) {
              $path =$value->store('public');
              $image= new Image();
              $image->description = 'description coming...';
              $image->url =$path;
              $image->post_id =$post->id;
              if(  $counter == 0){
              $image->featured=true;
              }else{
                $image->featured=false;
              }

              $image->save();
              $counter++;


            }

        }
    return redirect()->back()->with('message','Post Created .....');
  }
}
