<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;
use App\Notifications\NewUserNotification;

use App\Models\User;

class SendNewUserNotification
{


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($user)
    {

        $admin = User::where('user_type', 'admin')->first();
        $admin->notify(new NewUserNotification($user->user));
    // Notification::send($admins, new NewUserNotification($event->user));
    }
}
