<?php

namespace App\Http\Requests\Admin;

use App\Base\Request\Web\AdminBaseRequest;

class BankAccountRequest extends AdminBaseRequest
{
    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':{
                    return [];
                }
            case 'POST':{
                    return [
                        'bank_name' => 'required|string|max:255',
                        'account_holder_name' => 'required|string|max:255',
                        'account_number' => 'required|string|min:16|max:16',
                    ];
                }
            case 'PUT':{
                    return [
                        'bank_name' => 'required|string|max:255',
                        'account_holder_name' => 'required|string|max:255',
                        'account_number' => 'required|string|min:16|max:16',
                    ];
                }
        }
    }
}
