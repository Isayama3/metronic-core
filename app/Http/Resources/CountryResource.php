<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'iso' => $this->iso,
            'iso3' => $this->iso3,
            'phone_code' => $this->phone_code,
        ];
    }
}
