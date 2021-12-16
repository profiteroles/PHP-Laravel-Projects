<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Track extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id'=>$this->id,
            'artist'=>$this->artist,
            'album'=>$this->album,
            'name'=>$this->name,
            'year'=>$this->year,
            'genre'=>new Genre($this->genre)
        ];
    }
}
