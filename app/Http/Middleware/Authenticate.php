<?php

namespace App\Http\Middleware;

use App\Base\Traits\Response\ApiResponseTrait;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    use ApiResponseTrait;
    protected $guards;

    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {

        if ($request->expectsJson()) {
            throw new HttpResponseException($this->setStatusCode(401)->respondWithError(__("main.unauthenticated_please_login_first.")));
        }

        if (!$request->expectsJson()) {
            return route('admin.login.form');
        }

    }
}
