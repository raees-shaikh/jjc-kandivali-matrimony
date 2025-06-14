<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendNotificationToOldUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\SendNotificationToOldUserEvent;

class SendNotificationToOldUserListener implements ShouldQueue
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
     * @param  \App\Events\SendNotificationToOldUserEvent  $event
     * @return void
     */
    public function handle(SendNotificationToOldUserEvent $event)
    {
        $user = $event->user;
        if ($user->email) {
            Mail::to($user->email)->send(new SendNotificationToOldUserMail($user));
        }
        if ($user->mobile) {
            // $res = MSG91::sms([
            //     "flow_id" => config('app.msg91_profile_rejected_flow_id'),
            //     "authkey" => config('app.msg91_auth_key'),
            //     "mobiles" => '91' . $user->mobile,
            //     "NAME" => str_limit($user->full_name, 27),
            // ]);
            // dd($res);
        }
    }
}
