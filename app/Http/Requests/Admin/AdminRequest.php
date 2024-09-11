<?php

namespace App\Http\Requests\Admin;

use App\Base\Request\Web\AdminBaseRequest;

class AdminRequest extends AdminBaseRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'country_code' => $this->country_code ?? '91',
            'language_id' => 1,
            'type_id' => 1,
        ]);
    }
    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'full_name' => 'required|string|max:255',
                        'email' => 'required|email|unique:admins,email',
                        'password' => 'required|string|min:6',
                        'phone' => 'required|string|max:20|unique:admins,phone',
                        'country_code' => 'required|numeric|exists:countries,phone_code',
                        'language_id' => 'required|integer|exists:languages,id',
                        'type_id' => 'required|integer|exists:types,id',
                        'roles' => 'required|array',
                    ];
                }
            case 'PUT': {
                    return [
                        'full_name' => 'required|string|max:255',
                        'email' => 'required|email|unique:admins,email,' . $this->route('admin'),
                        'phone' => 'required|string|max:20|unique:admins,phone,' . $this->route('admin'),
                        'roles' => 'required|array',
                    ];
                }
        }
    }
}
