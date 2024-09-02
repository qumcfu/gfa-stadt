<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Login
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // saves timestamp of user's login
        $user = $event->user;
        if(isset($user))
        {
            $user['last_login'] = now();
            $user->timestamps = false;
            $user->save();
        }
    }
}
