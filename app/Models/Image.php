<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $fillable = [
      'description','url','post_id','featured'
  ];

  public function post()
  {
      return $this->belongsTo( Post::class,'post_id','id' );
  }
}
