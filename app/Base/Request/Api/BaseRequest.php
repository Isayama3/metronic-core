<?php

namespace App\Base\Request\Api;

use App\Http\Traits\JsonResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Request extends FormRequest
{
    use JsonResponseTrait;

    public function authorize()
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        $errors = [];

        foreach ($validator->errors()->toArray() as $key => $error) {
            $errors[$key] = $error[0];
        }

        throw new HttpResponseException($this->jsonResponse(422, __('general::lang.wrongData'), $errors, null));
    }
}
