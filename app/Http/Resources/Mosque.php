<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class Mosque extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'imam_name' => $this->imam_name,
            'location' => $this->location,
            'phone' => $this->phone,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
        ];
    }
}
