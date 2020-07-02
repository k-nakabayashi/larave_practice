<?php

namespace App\Listeners;

use App\Events\PersonEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Log;
class PersonEventListener
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
     * @param  PersonEvent  $event
     * @return void
     */
    public function handle(PersonEvent $event)
    {
        // Storage::append('person_access_log.txt',
        //     '[PersonEvent]'.now().' '.$event->user->id);
        
        Log::debug('[PersonEvent]'.now().' '.$event->user->id);
    }
}
