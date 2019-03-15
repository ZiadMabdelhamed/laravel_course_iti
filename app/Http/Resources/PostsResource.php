<?php

namespace App\Http\Resources;

use App\Http\Resources\user\UsersResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        $data['data'] =  [

            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'updated_at' => $this->updated_at->tostring(),
            'user' => new UsersResource($this->user)


        ];
        $data['status'] = 200;

        return $data;

    }
}
