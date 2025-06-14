<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Lib\MSG91\MSG91;
use App\Lib\MSG91\SMSCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'reset');
    }

    public function loginShow()
    {
        // return view('frontend.login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['phone' => 'required|digits:10']);
        // dd($request);

        if (config('app.env') != 'local') {
            $otp = MSG91::sendOTP([
                'mobile' => config('msg91.country') . $request->phone,
                "message" =>  Lang::get(config('msg91.map')[SMSCode::SEND_OTP]),
                "template_id" => SMSCode::SEND_OTP,
            ]);

            // dd($otp);
            if ($otp->success) {
                return response()->json(['success' => true, 'phone' => $request->phone, 'message' => 'OTP Sent']);
            } else {
                return response()->json(['success' => false, 'message' => 'There was an error sending otp']);
            }
        } else {
            return response()->json(['success' => true, 'phone' => $request->phone, 'message' => 'OTP Sent']);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['phone' => 'required|digits:10', 'otp' => 'required|numeric']);


        // dd($verify);
        if (config('app.env') != 'local') {
            $verify = MSG91::verifyOTP([
                "mobile" => config('msg91.country') . request("phone"),
                "otp" => request("otp"),
            ]);
            // dd($verify);
            if (!$verify->success) {
                return response()->json(['success' => false, 'message' => 'Otp Not Verified']);
            }
        } else {
            if ($request->otp != '1234') {
                return response()->json(['success' => false, 'message' => 'Otp Not Verified']);
            }
        }

        $user = User::firstOrCreate(
            ['mobile' => $request->phone],
            ['updated_at' => now()]
        );
        if ($user) {
            if (!$user->profile_no) {
                $user->profile_no = 'JJC' . rand(1000, 9999) . $user->id;
                $user->save();
            }
            $url = route('frontend.profile');
            Auth::guard('web')->login($user);
            if (!$user->full_name || !$user->mosal_name) {
                $url = route('frontend.form-one');
            }
            if (!$user->getActiveSubscription()) {
                $url = route('frontend.subscription');
            }
            return response()->json(['success' => true, 'message' => 'OTP Verified', 'url' => $url]);
        }
        return response()->json(['success' => false, 'message' => 'Something Went Wrong']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/')->with(['message' => 'Logged Out Successfully', 'alert-type' => 'success']);
    }
}
