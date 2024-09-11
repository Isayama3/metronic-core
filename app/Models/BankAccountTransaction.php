<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class BankAccountTransaction extends BaseModel
{
    public function getReceiptUrlAttribute()
    {
        return $this->getImageUrl('receipt');
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function agent()
    {
        return $this->belongsTo(Admin::class, 'agent_id');
    }

}
