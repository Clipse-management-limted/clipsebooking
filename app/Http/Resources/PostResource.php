<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CategoryResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
              'post_id' => $this->id,
                'post_title' => $this->title,
                  'post_content' => $this->content,
                    'post_type' => $this->type,
                      'author_id' => $this->author_id,
                        'category_id' => $this->category_id,
                          'post_meta' => $this->meta_data,
                            'updated_at' => $this->updated_at,
                            'category' => new CategoryResource($this->category),
                            'author'  => new UserResource($this->author),
                              'images' =>  ImageResource::collection($this->image),
                              'tags' =>  TagResource::collection($this->tag),
                              'comments' => CommentResource::collection($this->comment),


        ];
    }
}
