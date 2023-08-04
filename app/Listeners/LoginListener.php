<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use App\Jobs\TestJob;
use App\Mail\TestCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginListener
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
    public function handle(LoginEvent $event): void
    {
        \Mail::to($event->user->email)->send(new TestCreated());
        TestJob::dispatch();
    }
}
