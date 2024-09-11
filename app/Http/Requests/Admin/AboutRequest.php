<?php

namespace App\Http\Requests\Admin;

use App\Base\Request\Web\AdminBaseRequest;

class AboutRequest extends AdminBaseRequest
{
    public function rules(): array
    {
        return [
            'about' => 'required|array',
            'about.*' => 'required|array',
            'about.*.title' => 'required|string',
            'about.*.content' => 'required|string',
        ];
    }
}
