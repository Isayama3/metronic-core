<?php

namespace App\Services\Admin\Auth;

use App\Services\User\UserService;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AdminAuthService
{
    private $model;
    private $userService;

    public function __construct(User $model, UserService $userService)
    {
        $this->model = $model;
        $this->userService = $userService;
    }

    public function login(FormRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $remember = $request->input('remember') && $request->remember == 1 ? $request->remember : 0;

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $arr = array('status' => 'success');
            return response()->json($arr);
        }

        $arr = array('status' => 'fail', 'data' => []);
        return response()->json($arr);
    }



    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
    }
}
