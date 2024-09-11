<?php

namespace App\Http\Requests\User;

use App\Base\Request\Api\BaseRequest;

class ChangeLanguageRequest extends BaseRequest
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
                        'language_id' => 'required|string|exists:languages,id',
                    ];
                }
            case 'PUT': {
                    return [];
                }
        }
    }
}
