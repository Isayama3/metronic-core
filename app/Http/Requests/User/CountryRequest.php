<?php

namespace App\Http\Requests\User;

use App\Base\Request\Api\BaseRequest;

class CountryRequest extends BaseRequest
{
    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                    ];
                }
            case 'PUT': {
                    return [];
                }
        }
    }
}
