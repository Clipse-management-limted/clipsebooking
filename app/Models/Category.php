<?php
namespace App\Models;
//namespace App\Modal;

use App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
          'title','color'
    ];

    public function post()
    {
        return $this->HasMany( Post::class);
    }
}
