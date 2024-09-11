<?php

use App\Mail\OTPMail;
use Carbon\Carbon;
use Illuminate\Encryption\Encrypter;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

if (!function_exists('getLocales')) {
    /**
     * @return array array of supported locales
     */
    function getLocales($forSeeder = false)
    {
        return $forSeeder ? ['ar' => 'ar_EG', 'en' => 'en_US'] : ['ar', 'en'];
    }
}

if (!function_exists('activeGuard')) {
    function activeGuard(): int | string | null
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth()->guard($guard)->check()) {
                return $guard;
            }

        }
        return null;
    }
}

if (!function_exists('get_current_lang')) {
    function get_current_lang()
    {
        return App::getLocale();
    }
}

if (!function_exists('formattedCreatedAt')) {
    /**
     * @return string formated date
     */
    function formattedCreatedAt($created_at, $shouldParse = false)
    {
        if ($shouldParse) {
            $created_at = Carbon::parse($created_at);
        }
        return $created_at->toDayDateTimeString() . ' - ' . $created_at->diffForHumans();
    }
}

if (!function_exists('retrieveFromCache')) {
    function retrieveFromCache(string $key, $model = null, $quries = null, $relations = null, $order = "ASC", $isCollection = true)
    {
        return cache()->rememberForever($key, function () use ($model, $quries, $relations, $order, $isCollection) {
            if ($model == null) {
                return null;
            }
            $records = $model::query();
            if ($relations != null) {
                $records = $records->with($relations);
            }
            if (is_array($quries)) {
                foreach ($quries as $query) {
                    if (array_key_exists('attr', $query)) {
                        $records = $records->{$query['fn']}($query['attr']);
                    } else {
                        $records = $records->{$query['fn']}();
                    }
                }
            }
            if ($order != "ASC") {
                $records = $records->latest();
            }
            if (!$isCollection) {
                return $records->first();
            }
            return $records->get();
        });
    }
}

if (!function_exists('removeFromCache')) {
    function removeFromCache(string $key)
    {
        cache()->forget($key);
    }
}

if (!function_exists('reCache')) {
    function reCache(string $key, $model = null, $relations = null, $order = "ASC", $isCollection = true)
    {
        removeFromCache($key);
        return retrieveFromCache($key, $model, $relations, $order, $isCollection);
    }
}

if (!function_exists('prepareQueryCache')) {
    function prepareQueryCache(string $fn, $attr = null)
    {
        return is_null($attr) ? ['fn' => $fn] : ['fn' => $fn, 'attr' => $attr];
    }
}

if (!function_exists('encryptData')) {
    /**
     * @param $data string raw data to encrypt
     * @return string encrypted data
     */
    function encryptData($data, $key)
    {
        $encrypter = new Encrypter($key, Config::get('app.cipher'));
        return $encrypter->encrypt($data);
    }
}

if (!function_exists('decryptData')) {
    /**
     * @param $data string encrypted data to decrypt
     * @return string decrypt data
     */
    function decryptData($data, $key)
    {
        $encrypter = new Encrypter($key, Config::get('app.cipher'));
        return $encrypter->decrypt($data);
    }
}

if (!function_exists('randomCode')) {
    /**
     * @param $length int size of randomly generated number max size 100
     * @param $type int 0 for alphanumeric , 1  for numeric only, 2 for alphapitical only
     * @return mixed
     */
    function randomCode($length, $type = 0)
    {
        $min_lenght = 1;
        $max_lenght = 100;
        $bigL = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $smallL = "abcdefghijklmnopqrstuvwxyz";
        $number = "123456789";
        $bigB = str_shuffle($bigL);
        $smallS = str_shuffle($smallL);
        $numberS = str_shuffle($number);
        $subA = substr($bigB, 0, 5);
        $subB = substr($bigB, 6, 5);
        $subC = substr($bigB, 10, 5);
        $subD = substr($smallS, 0, 5);
        $subE = substr($smallS, 6, 5);
        $subF = substr($smallS, 10, 5);
        $subG = substr($numberS, 0, 5);
        $subH = substr($numberS, 6, 5);
        $subI = substr($numberS, 9, 5);
        switch ($type) {
            case 1:
                $RandCode1 = str_shuffle($subG . $subH . $subI);
                break;
            case 2:
                $RandCode1 = str_shuffle($subA . $subD . $subB . $subF . $subC . $subE);
                break;
            default:
                $RandCode1 = str_shuffle($subA . $subD . $subB . $subF . $subC . $subE . $subG . $subH . $subI);
                break;
        }
        $RandCode2 = str_shuffle($RandCode1);
        $RandCode = $RandCode1 . $RandCode2;

        if ($length > $min_lenght && $length < $max_lenght) {
            $CodeEX = substr($RandCode, 0, $length);
        } else {
            $CodeEX = $RandCode;
        }
        return $CodeEX;
    }
}

# Send OTP Mail
if (!function_exists('sendOtpMail')) {
    function sendOtpMail($code, $email)
    {
        $sentMessage = Mail::to($email)->send(
            new OTPMail($code)
        );

        return $sentMessage instanceof SentMessage;
    }
}
