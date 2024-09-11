<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'wallet_balance' => $this->wallet_balance ?? 0,
            'withdraw_money' => $this->withdraw_money ?? 0,
            'deposited_money' => $this->deposited_money ?? 0,
            'to_be_deposit' => $this->to_be_deposit ?? 0,
            'fines_balance' => $this->fines_balance ?? 0,
            'transactions' => WalletTransactionResource::collection($this->whenLoaded('transactions')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
