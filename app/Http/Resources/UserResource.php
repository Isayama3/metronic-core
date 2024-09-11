<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'country_code' => $this->country_code,
            'phone' => $this->phone,
            'is_smoking' => $this->is_smoking ? true : false,
            'is_registration_completed' => $this->is_registration_completed,
            'active' => $this->active,
            'latitude' => $this->latitude ?? 0,
            'longitude' => $this->longitude ?? 0,
            'birthday' => $this->birthday ?? '',
            'image' => $this->image_url,
            'fcm_token' => $this->fcm_token,
            'nationality' => $this->nationality?->name ?? '',
            'language' => $this->language?->name ?? 'ar',
            'is_all_verified_for_publish_ride' => $this->is_all_verified_for_publish_ride,
            'rating' => $this->rating_avg,
            'verifications' => UserVerificationResource::make($this->whenLoaded('verifications')),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
