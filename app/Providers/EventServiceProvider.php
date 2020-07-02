<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\PersonEvent;
use App\Listeners\PersonEventListener;

use App\Events\PublishProcessor;
use App\Listeners\MessageSubscriber;

use App\Listeners\MessageQueueSubscriber;

class EventServiceProvider extends ServiceProvider
{
    // protected $subscribe = [
    //     //MyEventSubscriber::class,
    // ];
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PublishProcessor::class => [
            //MessageSubscriber::class,
            MessageQueueSubscriber::class,
        ],
    ];
    
    // public function shouldDiscoverEvents()
    // {
    //     return true;    
    // }

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();


        // Event::listen(
        //     PublishProcessor::class,  MessageSubscriber::class
        // );
        // $this->app['events']->listen(
        //     PublishProcessor::class,  MessageSubscriber::class
        // );
    }
}
