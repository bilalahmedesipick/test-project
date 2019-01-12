<?php

namespace App\Listeners;

use App\Events\EmailSend;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EmailSendListener
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
    public function handle(EmailSend $event)
    {

            $url = Storage::url('Bilal Ahmed.pdf');
       // $file = '/path/to/your/file';
        $filesize = Storage::size('Bilal Ahmed.pdf');;



        $data = array('name' => 'Bilal Ahmed', 'file' => $url, 'size'=> $filesize/1000000);

            Mail::send('EmailTemplates.default', $data, function ($message){
               $message->to('bilalahmed.comsian1@gmail.com');
            });


    }
    public function failed(EmailSend $event, $exception)
    {
        dd($exception);
    }
}
