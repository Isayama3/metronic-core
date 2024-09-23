<?php

namespace App\Http\Requests\User;

use App\Base\Request\Api\UserBaseRequest;

class UpdateProfileRequest extends UserBaseRequest
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
                        'full_name' => 'nullable|string|max:255',
                        'email' => 'nullable|email|max:255|unique:users,email,' . auth('user-api')->id(),
                        'country_code' => 'nullable|string|max:5|exists:countries,phone_code',
                        'phone' => 'nullable|string|max:15|unique:users,phone,' . auth('user-api')->id(),
                        'is_smoking' => 'nullable|boolean',
                        'latitude' => 'nullable|numeric|min:-90|max:90',
                        'longitude' => 'nullable|numeric|min:-180|max:180',
                        'birthday' => 'nullable|date_format:Y-m-d',
                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:' . config('settings.max_image_size'),
                        'nationality_id' => 'nullable|exists:countries,id',
                        'language_id' => 'nullable|exists:languages,id',
                    ];
                }
            case 'PUT': {
                    return [];
                }
        }
    }
}
