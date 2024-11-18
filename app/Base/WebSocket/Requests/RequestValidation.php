<?php

namespace App\Base\WebSocket\Requests;

use App\Base\WebSocket\Interfaces\IRequestValidation;

class RequestValidation implements IRequestValidation
{
    public function rules(): array
    {
        return [];
    }
    
    public function validate($request_data): array
    {
        $validation_errors = [];
        $rules = $this->rules();
        foreach ($rules as $field => $rule) {
            $value = $request_data->$field ?? null;

            if (isset($rule['required']) && $rule['required'] && ($value === null || $value === '')) {
                $validation_errors[$field] = "The $field field is required.";
                continue;
            }

            if (isset($rule['string']) && $rule['string'] && $value !== null && !is_string($value)) {
                $validation_errors[$field] = "The $field field must be a string.";
            }

            if (isset($rule['numeric']) && $rule['numeric'] && $value !== null && !is_numeric($value)) {
                $validation_errors[$field] = "The $field field must be numeric.";
            }

            if (isset($rule['double']) && $rule['double'] && $value !== null && !is_float($value + 0)) {
                $validation_errors[$field] = "The $field field must be a double (floating-point number).";
            }

            if (isset($rule['in']) && is_array($rule['in']) && $value !== null && !in_array($value, $rule['in'])) {
                $allowedValues = implode(', ', $rule['in']);
                $validation_errors[$field] = "The $field field must be one of the following: $allowedValues.";
            }
        }

        if (!empty($validation_errors)) {
            return $validation_errors;
        }

        return [];
    }
}
