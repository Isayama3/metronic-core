<?php

namespace App\Http\Requests\Admin;

use App\Base\Request\Web\AdminBaseRequest;

class TermRequest extends AdminBaseRequest
{
    public function rules(): array
    {
        return [
            'terms' => 'required|array',
            'terms.*' => 'required|array',
            'terms.*.title' => 'required|string',
            'terms.*.content' => 'required|string',
        ];
    }
}
