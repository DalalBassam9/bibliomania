<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FavoriteCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'favorite_count' => $this->count(),
            'user_favorite_post' => $this->collection->contains('id', auth()->user()->id),
            'user_favorite_book' => $this->collection->contains('id', auth()->user()->id),
            'links' => [
                'self' => url('/posts'),
            ]
        ];
    }
}
