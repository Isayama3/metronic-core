<?php

namespace App\Http\Controllers\User\Auth;

use App\Base\Traits\Response\ApiResponseTrait;
use App\Enums\UserVerificationStatus;
use App\Http\Requests\User\Auth\LoginRequest;
use App\Http\Requests\Global\Api\SendOTPRequest;
use App\Http\Requests\Global\Api\VerifyOTPRequest;
use App\Http\Requests\User\Auth\CompleteRegistrationRequest;
use App\Http\Requests\User\Auth\ForgetPasswordRequest;
use App\Http\Requests\User\Auth\RegisterRequest;
use App\Http\Requests\User\Auth\ResetPasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\UserVerification;
use App\Services\User\Auth\UserAuthService;
use App\Services\User\OtpService;
use App\Services\User\UserService;
use App\Services\User\UserVerificationService;
use Illuminate\Support\Facades\DB;

class AuthController
{
    use ApiResponseTrait;

    private $UserAuthService;
    private $UserService;
    private $OtpService;
    private $UserVerificationService;

    private string $modelResource = UserResource::class;

    public function __construct(UserAuthService $UserAuthService, UserService $UserService, OtpService $OtpService, UserVerificationService $UserVerificationService)
    {
        $this->UserAuthService = $UserAuthService;
        $this->UserService = $UserService;
        $this->OtpService = $OtpService;
        $this->UserVerificationService = $UserVerificationService;
    }

    public function login(LoginRequest $request)
    {
        $user = $this->UserAuthService->login($request);

        $data = [
            'access_token' => $this->UserAuthService->createToken($user),
            'user' => new $this->modelResource($user)
        ];

        return $this->respondWithSuccess(__('auth.successfully_login'), $data);
    }

    public function Register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->UserService->store($request->validated());
            $this->OtpService->sendOTP(new SendOTPRequest($request->validated()));
            $user->verifications()->create();
            DB::commit();
            return $this->respondWithModelData(new $this->modelResource($user));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorInternalError();
        }
    }

    public function completeRegistration(CompleteRegistrationRequest $request)
    {
        $user = $this->UserService->update(auth('user-api')->id(), $request->validated());

        $data = [
            'access_token' => $request->bearerToken(),
            'user' => new $this->modelResource($user)
        ];

        return $this->respondWithSuccess(__('auth.successfully_register'), $data);
    }

    public function verifyOTP(VerifyOTPRequest $request)
    {
        $this->OtpService->verifyOTP($request);
        $user = $this->UserService->getUserByPhoneOrEmail($request->phone, $request->email);
        $access_token = $this->UserAuthService->createToken($user);

        $verify = $request->phone ? 'phone_status_id' : 'email_status_id';
        $this->UserVerificationService->update($user->verifications->id, [$verify => UserVerificationStatus::VERIFIED->value]);
        $user->refresh();

        $data = [
            'access_token' => $access_token,
            'user' => new $this->modelResource($user)
        ];

        return $this->respondWithSuccess(__('auth.successfully_verified'), $data);
    }

    public function resendOTP(SendOTPRequest $request)
    {
        $this->OtpService->sendOTP($request);
        return $this->respondWithSuccess();
    }

    public function forgotPassword(ForgetPasswordRequest $request)
    {
        $this->OtpService->sendOTP($request);
        return $this->respondWithSuccess(__('auth.otp_sent'));
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $this->UserService->update(auth('user-api')->id(), $request->validated());
        return $this->respondWithSuccess(__('auth.password_reset'));
    }
}
