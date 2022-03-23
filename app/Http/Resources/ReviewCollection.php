<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewCollection extends ResourceCollection
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
            'review_count' => $this->count(),
            'review_sum'   =>round($this->collection->sum('rating') / ($this->collection->count()), 1),
            'links' => [
                'self' => url('/reivews'),
            ]
        ];
    }
}
