<?php

namespace App\Lib\MSG91;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class MSG91
{
    const URL = 'https://api.msg91.com/api/v5/';


    const STATUS_CODE = [
        "505" => "Demo account",
        "418" => "IP not whitelisted",
        "200" => "Ok",
        "101" => "Missing mobile no.",
        "102" => "Missing message",
        "103" => "Missing sender ID",
        "105" => "Missing password",
        "106" => "Missing Authentication Key",
        "107" => "Missing Route",
        "202" => "Invalid mobile number. You must have entered either less than 10 digits or there is an alphabetic character in the mobile number field in API.",
        "203" => "Invalid sender ID. Your sender ID must be 6 characters, alphabetic.",
        "207" => "Invalid authentication key. Crosscheck your authentication key from your account’s API section.",
        "208" => "IP is blacklisted. We are getting SMS submission requests other than your whitelisted IP list.",
        "301" => "Insufficient balance to send SMS",
        "302" => "Expired user account. You need to contact your account manager.",
        "303" => "Banned user account",
        "306" => "This route is currently unavailable. You can send SMS from this route only between 9 AM - 9 PM.",
        "307" => "Incorrect scheduled time",
        "308" => "Campaign name cannot be greater than 32 characters",
        "309" => "Selected group(s) does not belong to you",
        "310" => "SMS is too long. System paused this request automatically.",
        "311" => "Request discarded because same request was generated twice within 10 seconds"
    ];


    public static function sendOTP($param)
    {
        $param['otp_expiry'] = $param['otp_expiry'] ?? 5;
        return static::setup('sendotp', $param);
    }

    public static function resendOTP($param)
    {
        $param['otp_expiry'] = $param['otp_expiry'] ?? 5;
        return static::setup('resendotp', $param);
    }

    public static function verifyOTP($param)
    {
        $param['otp_expiry'] = $param['otp_expiry'] ?? 5;
        return static::setup('verify', $param);
    }
    public static function sms($param)
    {
        $url = config('app.msg91_base_url');
        $param['url'] = $param['url'] ?? $url;
        return static::setup('flow', $param);
    }


    private static function setup($action, $param)
    {
        // dd($action, $param);
        $param['authkey'] = $param['authkey'] ?? env('MSG91_AUTH_KEY');
        $sms = [
            "sendotp" => "otp?",
            "resendotp" => "otp/resend?",
            "verify" => "otp/verify?",
            "sms" => "sendhttp.php",
            "showSmsBalance" => "balance.php",
            "flow" => 'flow'
        ];
        if (!array_key_exists($action, $sms)) {
            return (object)(["success" => false, "message" => "invalid request"]);
        }
        $url = ($param['url'] ?? static::URL) . $sms[$action];
        unset($param['url']);

        try {
            // dd($action, $param);
            if ($action == 'verify') {
                $response = Http::withOptions(["verify" => false])->get($url, $param);
            } else {
                $response = Http::withOptions(["verify" => false])->post($url, $param);
            }
            // Log::info('try');
            // Log::info($response);
        } catch (\Throwable $th) {
            Log::info('catch');
            Log::info($th->getMessage());
            return (object)(["success" => false, "message" => $th->getMessage()]);
        }
        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody());
            if ($data) {
                return static::checkResponse($data);
            } else {
                return (object) (["success" => true, "message" => 'sucsess']);
            }
        } else {
            return (object)(["success" => false, "message" => $response->message]);
        }
    }


    public static function checkResponse($response)
    {

        if (isset($response->type)) {

            try {
                if (gettype((object) $response) != 'object' && gettype($response) != 'array') {
                    return (object)(["success" => true, "message" => ($response ?? 'success')]);
                } elseif (strtolower($response->type) == "success") {
                    return (object)(["success" => true, "message" => ($response->message ?? 'success')]);
                } else if (strtolower($response->message) == "success") {
                    return (object) (["success" => true, "message" => $response->type]);
                }
                if (strtolower($response->type) == "error") {
                    return (object)(["success" => false, "message" => ($response->message ?? 'Failed')]);
                } else if (strtolower($response->message) == "error") {
                    return (object) (["success" => false, "message" => $response->type]);
                } else {
                    return (object)(["success" => false, "message" => ($response->message ?? 'success')]);
                }
            } catch (\Throwable $th) {
                return (object)(["success" => false, "message" => ('Failed')]);
            }
        } else {
            return ["success" => false, "message" => 'Failed'];
        }
    }

    public static function showSmsBalance($param)
    {
        $url = 'https://api.msg91.com/api/';
        $param['url'] = $param['url'] ?? $url;

        return static::setup('showSmsBalance', $param);
    }
}
