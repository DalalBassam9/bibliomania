<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'books',
                'book_id' => $this->id,
                'attributes' => [
                    'name' => $this->name,
                    'author'=>$this->author,
                    'file'  =>$this->file,
                    'description' => $this->description,
                   'image' =>  $this->image,
                     'reviews' => new ReviewCollection($this->reviews),
                   'favorites'  => new FavoriteCollection($this->favorites),

            ],
        ],
            'links' => [
                'self' => url('/books/'.$this->id),
            ]
            ];

    }
}
