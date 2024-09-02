<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Logout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        $user = $event->user;
        if(isset($user))
        {
            $user['impersonate_id'] = null;
            if($user->isDirty())
            {
                $user->timestamps = false;
                $user->save();
            }
        }
    }
}
