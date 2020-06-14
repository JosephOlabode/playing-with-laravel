<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemsResource extends JsonResource
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
          'id' => $this->type,
          'type' => $this->type,
          'name' => $this->name,
          'company' => $this->company,
          'bike_id' => $this->bike_id,
          'created_at' => (string) $this->created_at,
          'updated_at' => (string) $this->updated_at
        ];
    }
}
