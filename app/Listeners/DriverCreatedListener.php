<?php

namespace App\Listeners;

use App\Mail\DriverWelcome;
use App\Services\AuditService;
use Illuminate\Support\Facades\Mail;
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
        $user = $event->user;
        $createdUserData = [
            'user_id' => $user->id,
            'action' => 'Account created',
            'details' => 'Your staff account has been created by '.ucfirst(auth()->user()->username).'',
        ];
        $adminUserData = [
            'user_id' => auth()->user()->id,
            'action' => 'Created staff account',
            'details' => 'You created an account for '.ucfirst($user->driver->first_name).'',
        ];
        $this->auditService->storeAudit($createdUserData);
        $this->auditService->storeAudit($adminUserData);

        Mail::to($user)->queue(new DriverWelcome());
    }
}
