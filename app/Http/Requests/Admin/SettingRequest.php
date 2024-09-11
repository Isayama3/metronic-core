<?php

namespace App\Http\Requests\Admin;

use App\Base\Request\Web\AdminBaseRequest;

class SettingRequest extends AdminBaseRequest
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
