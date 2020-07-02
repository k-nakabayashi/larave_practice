<?php
namespace App\Listeners;
use App\Events\PersonEvent;
use App\Listeners\PersonEventListener;

class MyEventSubscriber {
    public function subscribe($events) {
        $events->listen(
            PersonEvent::class,
            PersonEventListener::class
        );
    }
}