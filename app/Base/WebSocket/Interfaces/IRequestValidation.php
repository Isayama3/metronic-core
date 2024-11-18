<?php

namespace App\Base\WebSocket\Interfaces;

interface IRequestValidation 
{
    public function rules(): array;
    public function validate($request_data): array;
}
