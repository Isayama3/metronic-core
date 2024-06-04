<?php

namespace App\Http\Requests\Admin;

use App\Base\Request\Web\AdminBaseRequest;

class RoleRequest extends AdminBaseRequest
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
                        'name' => 'required|string|max:255',
                        'description' => 'nullable|string|max:1000',
                        'permissions' => 'required|array',
                        'permissions.*' => 'required|exists:permissions,id',
                    ];
                }
            case 'PUT': {
                    return [
                        'name' => 'nullable|string|max:255',
                        'description' => 'nullable|string|max:1000',
                        'permissions' => 'nullable|array',
                        'permissions.*' => 'nullable|exists:permissions,id',
                    ];
                }
        }
    }
}
