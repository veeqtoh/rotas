<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Certification;
use App\Response\DownloadResponse;
use App\Services\AuditService;

class UserProfile extends Component
{
    public $user;
    public $currentView = "basic";
    private AuditService $auditService;

    public function boot(DownloadResponse $downloadResponse, AuditService $auditService)
    {
        $this->downloadResponse = $downloadResponse;
        $this->auditService = $auditService;
    }

    public function mount($user)
    {
        $this->user = $user;
    }

    public function updateView($newView)
    {
        $this->currentView = $newView;
    }

    public function downloadFile(Certification $certification)
    {
        return $this->downloadResponse->singleDownload($certification);
    }

    public function render()
    {
        return view('livewire.user-profile', [
            'colleagues' => User::where('id', '!=', $this->user->id)->get(),
            'audits' => $this->auditService->getAllAudits($this->user->id),
        ]);
    }
}
