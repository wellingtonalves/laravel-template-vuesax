<?php

namespace App\Listeners;

use App\Notifications\PasswordResetSuccessNotification;
use Illuminate\Auth\Events\PasswordReset;

class SendPasswordResetEmail
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
     * @param  PasswordReset  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        $user->notify(new PasswordResetSuccessNotification($user));
    }
}
