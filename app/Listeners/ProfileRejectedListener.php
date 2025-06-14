<?php

namespace App\Listeners;

use App\Lib\MSG91\MSG91;
use App\Mail\ProfileRejectedMail;
use App\Events\ProfileRejectedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProfileRejectedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProfileRejectedEvent  $event
     * @return void
     */
    public function handle(ProfileRejectedEvent $event)
    {
        $user = $event->user;
        //dd($user);
        if ($user->email) {
            Mail::to($user->email)->send(new ProfileRejectedMail($user));
        }
        if ($user->mobile) {
            $res = MSG91::sms([
                "flow_id" => config('app.msg91_profile_rejected_flow_id'),
                "authkey" => config('app.msg91_auth_key'),
                "mobiles" => '91' . $user->mobile,
                "NAME" => str_limit($user->full_name, 27),
            ]);
            // dd($res);
        }
    }
}
