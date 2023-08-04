<?php

namespace App\Listeners;

use App\Events\DoTheApiCallEvent;
use App\Events\LoginEvent;
use App\Http\Contracts\TestContract;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ApiCallListener
{
    /**
     * Create the event listener.
     */
    public function __construct(
        private TestContract $testContract
    )
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DoTheApiCallEvent $event): void
    {
        \Log::info(json_encode($this->testContract->getAllTests()));
    }
}
