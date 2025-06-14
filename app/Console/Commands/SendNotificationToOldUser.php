<?php

namespace App\Console\Commands;

use App\Events\SendNotificationToOldUserEvent;
use App\Models\User;
use Illuminate\Console\Command;

class SendNotificationToOldUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send_notification:old_users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::get();
        foreach($users as $user)
        {
            event(new SendNotificationToOldUserEvent($user));
        }
        return 0;
    }
}
