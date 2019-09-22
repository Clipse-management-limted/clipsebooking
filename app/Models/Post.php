<?php

namespace App\Models;
use App\User;
use App\Models\Image;
use App\Models\Video;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'title', 'content', 'post_type','author_id','category_id','meta_data',
  ];

  public function author()
  {
      return $this->belongsTo( User::class,'author_id','id');
  }

  public function category()
  {
      return $this->belongsTo( Category::class,'category_id','id');
  }

  public function image()
  {
      return $this->HasMany( Image::class,'post_id','id');
  }

  public function video()
  {
      return $this->HasMany( Video::class,'post_id','id');
  }

  public function tag()
  {
      return $this->belongsToMany( Tag::class);
  }

  public function comment()
  {
      return $this->HasMany( Comment::class,'post_id','id');
  }

  public function link()
  {
     return '/posts/' . $this->id;
  }


}
