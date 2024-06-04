<?php

namespace App\Services\User\Auth;

use App\Base\Traits\Response\ApiResponseTrait;
use App\Services\User\UserService;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class UserAuthService
{
    use ApiResponseTrait;

    private $model;
    private $userService;

    public function __construct(User $model, UserService $userService)
    {
        $this->model = $model;
        $this->userService = $userService;
    }

    public function login(FormRequest $request)
    {
        $user = $this->model::where('phone', $request->phone)->where('country_code', $request->country_code)->first();

        if (!$user || !$user->password)
            throw new HttpResponseException($this->setStatusCode(422)->respondWithError(__("Credentials are wrong")));

        if (Hash::check($request->input('password'), $user->password)) {
            if ($request->device_token)
                $this->userService->update($user, [
                    'fcm_token' => $request->device_token,
                    'language' => $request->header('accept-language') ?? 'ar',
                ]);

            $this->createToken($user);
            return $user;
        }

        throw new HttpResponseException($this->setStatusCode(422)->respondWithError(__("Credentials are wrong")));
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
