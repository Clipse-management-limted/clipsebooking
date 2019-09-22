<?php
use App\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Image;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     factory( User::class ,200)->create();
      factory( Post::class ,105)->create();
      factory( Tag::class ,50)->create();
      factory( Image::class ,250)->create();
      factory( Video::class ,250)->create();
      factory( Comment::class ,350)->create();
      factory( Category::class ,10)->create();
    }
}
