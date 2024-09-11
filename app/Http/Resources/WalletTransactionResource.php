<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletTransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'amount' => $this->amount,
            'status' => $this->whenLoaded('status', function () {
                return $this->status->name;
            }),
            // 'ride_request' => RideRequestResource::make($this->whenLoaded('rideRequest')),
            // 'wallet' => WalletResource::make($this->whenLoaded('wallet')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
