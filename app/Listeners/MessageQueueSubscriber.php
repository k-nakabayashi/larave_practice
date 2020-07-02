<?php
declare(strict_types=1);

namespace App\Listeners;

use App\Events\PublishProcessor;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class MessageQueueSubscriber implements ShouldQueue
{
    use InteractsWithQueue;
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
     * @param  PublishProcessor  $event
     * @return void
     */
    public function handle(PublishProcessor $event)
    {
        Log::info("MessageQueueSubscriber : id :".$event->getInt());
    }
}
