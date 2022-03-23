<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Review extends JsonResource
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
        'type' => 'reviews',
        'review_id' => $this->id,
        'attributes' => [

                    'review_by' =>  new UserResource($this->user),
            'review' => $this->rating,
            'review_at' => $this->created_at->diffForHumans(),
        ]
    ],
            'links' => [
        'self' => url('/reviews/' . $this->review_id),
    ]
            ];
    }
}