<?php

namespace App\Listeners;

use App\Lib\MSG91\MSG91;
use App\Mail\ProfileApprovedMail;
use App\Events\ProfileApprovedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProfileApprovedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('listener');
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProfileApprovedEvent  $event
     * @return void
     */
    public function handle(ProfileApprovedEvent $event)
    {
        $user = $event->user;
        if ($user->email) {
            Mail::to($user->email)->send(new ProfileApprovedMail($user));
        }
        if ($user->mobile) {
            $res = MSG91::sms([
                "flow_id" => config('app.msg91_profile_approved_flow_id'),
                "authkey" => config('app.msg91_auth_key'),
                "mobiles" => '91' . $user->mobile,
                "NAME" => str_limit($user->full_name, 27),
            ]);
            // dd($res);
        }
    }
}
