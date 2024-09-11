<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Requests\Admin\Auth\ProfileRequest;
use App\Services\AdminService;
use App\Services\Auth\AdminAuthService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    public const VIEWPATH = 'admin.auth.';

    private $AdminAuthService;
    private $AdminService;

    public function __construct(AdminAuthService $AdminAuthService, AdminService $AdminService)
    {
        $this->AdminAuthService = $AdminAuthService;
        $this->AdminService = $AdminService;
    }

    public function loginView()
    {
        return view(static::VIEWPATH  . __FUNCTION__);
    }

    public function loginPost(LoginRequest $request)
    {
        return $this->AdminAuthService->login($request);
    }

    public function logout(Request $request)
    {
        $this->AdminAuthService->logout($request);
        return redirect(route('admin.login.form'));
    }

    public function updateProfileView()
    {
        $update_route = 'admin.profile.post';
        $record = auth('admin')->user();
        return view('admin.auth.profile', compact('update_route', 'record'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $admin = auth('admin')->user();
        $this->AdminService->update(auth('admin')->id(), $request->validated(), ['old_password', 'new_password']);

        if ($request->input('old_password')) {
            if (Hash::check($request->input('old_password'), $admin->password)) {
                $admin->password = $request->input('new_password');
                $admin->save();
            } else {
                return redirect()->back()->with('error', __('admin.old_password_is_incorrect'));
            }
        }

        return redirect()->back()->with('success', __('admin.profile_updated_successfully'));
    }
}
