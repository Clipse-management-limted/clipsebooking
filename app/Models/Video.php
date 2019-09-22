<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  protected $fillable = [
      'title','url','post_id',
  ];

  public function post()
  {
      return $this->belongsTo( Post::class,'post_id','id' );
  }
}
