<?php

namespace App\Services\Auth;

use App\Base\Traits\Custom\HttpExceptionTrait;
use App\Base\Traits\Response\ApiResponseTrait;
use App\Models\User;
use App\Services\OtpService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class UserAuthService
{
    use ApiResponseTrait, HttpExceptionTrait;

    private $model;
    private $userService;
    private $otpService;

    public function __construct(User $model, UserService $userService, OtpService $otpService)
    {
        $this->model = $model;
        $this->userService = $userService;
        $this->otpService = $otpService;
    }

    public function login(FormRequest $request)
    {
        $user = $this->model::where('phone', $request->phone)->where('country_code', $request->country_code)->first();
        if (!$user) {
            return $this->throwHttpExceptionForWebAndApi(__('main.credentials_are_wrong'), 422);
        }

        if ($user->is_registration_completed == false) {
            $this->otpService->sendOTP($request);
            return $this->throwHttpExceptionForWebAndApi(__('main.please_complete_your_registration'), 422);
        }

        if (Hash::check($request->input('password'), $user->password)) {
            if ($request->fcm_token) {
                $this->userService->update($user->id, [
                    'fcm_token' => $request->fcm_token,
                    // 'language' => $request->header('accept-language') ?? 'ar',
                ]);
            }

            $this->createToken($user);
            return $user;
        }

        return $this->throwHttpExceptionForWebAndApi(__('main.credentials_are_wrong'), 422);
    }

    /**
     * Create sanctum token for user
     * @param User $user
     * @param array|null $abilities
     * @return string
     */
    public function createToken($user, $abilities = null): string
    {
        $accessToken = $user->createToken('snctumToken', $abilities ?? [])->plainTextToken;
        $this->addTokenExpiration($accessToken);
        return $accessToken;
    }

    public function logout(Request $request)
    {
        auth(activeGuard())?->user()->update([
            'fcm_token' => null,
        ]);
        PersonalAccessToken::findToken($request->bearerToken())->delete();
    }

    protected function addTokenExpiration($accessToken): void
    {
        $expirationTime = Carbon::now()->addDays(90);
        $personalAccessToken = PersonalAccessToken::findToken($accessToken);
        $personalAccessToken->expires_at = $expirationTime;
        $personalAccessToken->save();
    }
}
