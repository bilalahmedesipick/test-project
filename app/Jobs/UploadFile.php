<?php

namespace App\Jobs;

use App\Events\EmailSend;
use App\Events\JobFailedEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;

class UploadFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $email, $file;

    public function __construct($email, $file)
    {
        $this->email =$email;
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Putting our file to storage s
        Event::fire(new EmailSend($this->email, $this->file));
        Log::error('upload queue started');
        Queue::failing(function (JobFailedEvent $event){
            $event->exception;
            Log::error($event->exception);
        });

    }

}
