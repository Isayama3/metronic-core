<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\Otp;
use Carbon\Carbon;

class OtpRepository extends BaseRepository
{
    /**
     * OtpRepository constructor.
     * @param Otp $model
     */
    public function __construct(Otp $model)
    {
        parent::__construct($model);
    }

    public function updateOrCreateBasedOnPhoneAndCountryCodeAndEmail($request, $otp)
    {
        $this->model->updateOrCreate([
            'phone' => $request->phone,
            'country_code' => $request->country_code,
            'email' => $request->email,
        ], [
            'otp' => $otp,
            'expired_at' => Carbon::now()->addMinutes(5)
        ]);
    }

    public function getOtpBasedOnPhoneAndCountryCodeOrEmail($request)
    {
        return Otp::where(function ($q) use ($request) {
            $q->where('phone', $request->phone);
            $q->where('country_code', $request->country_code);
        })
            ->orWhere('email', $request->email)
            ->first();
    }
}
