<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->resource->email,
            'username' => $this->resource->username,
            'employeeId' => $this->resource->employee_id,
            'verified' => !is_null($this->resource->email_verified_at),
            'firstName'  =>  $this->resource->driver->first_name,
            'otherName'  =>  $this->resource->driver->other_name,
            'lastName'  =>  $this->resource->driver->last_name,
            'birthDate'  =>  $this->resource->driver->date_of_birth,
            'gender'  =>  $this->resource->driver->gender,
            'nationality'  =>  $this->resource->driver->nationality,
            'primaryPhoneNumber'  =>  $this->resource->driver->phone_1,
            'alternativePhoneNumber'  =>  $this->resource->driver->phone_2,
            'avatar'  =>  $this->resource->avatar,
            'employmentDate'  =>  $this->resource->driver->employment_date,
            'addressLine1'  =>  $this->resource->driver->address_line_1,
            'addressLine2'  =>  $this->resource->driver->address_line_2,
            'maritalStatus'  =>  $this->resource->driver->marital_status,
            'createdAt'  =>  $this->resource->created_at->format('Y-m-d H:i:s')
        ];
    }
}
