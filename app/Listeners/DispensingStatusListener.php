<?php

namespace App\Listeners;

use App\Events\DispensingStatus;
use Illuminate\Support\Facades\Log;

class DispensingStatusListener
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
    public function handle(DispensingStatus $event): void
    {
        $status = $event->status;
        Log::info("Dispensing Status Listener Message: ". $status);
    }
}
