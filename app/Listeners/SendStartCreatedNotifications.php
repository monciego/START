<?php

namespace App\Listeners;

use App\Events\StartCreated;
use App\Models\User;
use App\Notifications\NewStart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendStartCreatedNotifications implements ShouldQueue
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
    public function handle(StartCreated $event): void
    {
        $admin1 = User::find(1);
        $admin2 = User::find(2);
        $admin1 ->notify(new NewStart($event->start));
        $admin2 ->notify(new NewStart($event->start));
    }
}
