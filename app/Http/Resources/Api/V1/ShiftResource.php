<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ShiftResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->resource->uuid,
            'van' => $this->resource->van->reg.' ('.$this->resource->van->brand.' - '.$this->resource->van->model.')',
            'start'  =>  $this->resource->start_time,
            'ends'  =>  $this->resource->end_time,
            'description'  =>  $this->resource->description,
        ];
    }
}
