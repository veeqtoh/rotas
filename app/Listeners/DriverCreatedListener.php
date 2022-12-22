<?php

namespace App\Listeners;

use App\Services\AuditService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DriverCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private AuditService $auditService)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
