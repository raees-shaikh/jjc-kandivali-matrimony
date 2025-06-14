<?php

namespace App\Listeners;

use App\Lib\MSG91\MSG91;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\SubscriptionExpiringReminderTwoMail;
use App\Events\SubscriptionExpiringReminderTwoEvent;

class SubscriptionExpiringReminderTwoListener implements ShouldQueue
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
     * @param  \App\Events\SubscriptionExpiringReminderTwoEvent  $event
     * @return void
     */
    public function handle(SubscriptionExpiringReminderTwoEvent $event)
    {
        $sub = $event->sub;
        $user = $sub->user;
        //dd($user);
        if ($user->email) {
            Mail::to($user->email)->send(new SubscriptionExpiringReminderTwoMail());
        }
        if ($user->mobile) {
            $res = MSG91::sms([
                "flow_id" => config('app.msg91_subscription_reminder_two_flow_id'),
                "authkey" => config('app.msg91_auth_key'),
                "mobiles" => '91' . $user->mobile,
                "NAME" => str_limit($user->full_name, 27),
            ]);
            // dd($res);
        }
    }
}
