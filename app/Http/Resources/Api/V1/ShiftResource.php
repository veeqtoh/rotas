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
            'starts'  =>  $this->resource->start_time->format('Y-m-d H:i:s'),
            'started'  =>  $this->resource->started,
            'ends'  =>  $this->resource->end_time->format('Y-m-d H:i:s'),
            'description'  =>  $this->resource->description,
        ];
    }
}
