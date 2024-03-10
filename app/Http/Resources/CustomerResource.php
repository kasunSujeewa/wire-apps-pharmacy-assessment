<?php

namespace App\Http\Resources;

use App\Constants\Constants;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mobile_no' => $this->mobile_no,
            'address' => $this->address,
            'status' => $this->is_active ? Constants::ACTIVE_STATUS : Constants::NOTACTIVE_STATUS,
            'created_at' => $this->created_at
        ];
    }
}
