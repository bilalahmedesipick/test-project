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
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Putting our file to storage s
//        Storage::disk('local')->put($file->getClientOriginalName(), file_get_contents($file->getRealPath()));
        Event::fire(new EmailSend());
        Log::error('upload queue started');
        Queue::failing(function (JobFailedEvent $event){
            $event->exception;
            Log::error($event->exception);
        });

    }

}
