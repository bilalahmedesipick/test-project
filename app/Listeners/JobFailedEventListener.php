<?php

namespace App\Listeners;

use App\Events\JobFailedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobFailedEventListener
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
    public function handle(JobFailedEvent $event)
    {
        $data = array('name' => 'Bilal Ahmed');

        Mail::send('welcome', $data, function ($message){
            $message->to('bilalahmed.comsian1@gmail.com');
        });
    }
}
