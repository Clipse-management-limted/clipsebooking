<?php

namespace App\Models;

use App\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
      'content','author_id','post_id',
  ];

  public function author()
  {
      return $this->belongsTo( User::class,'author_id','id');
  }

  public function post()
  {
      return $this->belongsTo( Post::class,'post_id','id' );
  }
}
