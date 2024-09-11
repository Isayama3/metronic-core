<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\OtpRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class OtpService extends BaseService
{
    protected OtpRepository $OtpRepository;

    public function __construct(OtpRepository $OtpRepository)
    {
        parent::__construct($OtpRepository);
        $this->OtpRepository = $OtpRepository;
    }

    public function sendOTP(FormRequest $request)
    {
        // $otp = OTPAggregator::generateOTP();
        $otp = 1234;
        $this->OtpRepository->updateOrCreateBasedOnPhoneAndCountryCodeAndEmail($request, $otp);

        // TODO :: Send OTP to user phone
        // TODO :: Send OTP to user email
    }

    public function verifyOTP(FormRequest $request)
    {
        $otp = $this->OtpRepository->getOtpBasedOnPhoneAndCountryCodeOrEmail($request);

        if (!$otp || $otp->otp != $request->otp) 
            return $this->throwHttpExceptionForWebAndApi(__("OTP is wrong"), 422);
        
        if ($otp->expired_at > Carbon::now()->addMinutes(5)) 
            return $this->throwHttpExceptionForWebAndApi(__("OTP is expired"), 422);
        
        if ($otp->otp == $request->otp) {
            $otp->delete();
            return true;
        }
    }
}
