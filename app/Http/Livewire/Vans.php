<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\VanService;

class Vans extends Component
{
    private VanService $vanService;

    public function boot(VanService $vanService)
    {
        $this->vanService = $vanService;
    }

    public function render()
    {
        return view('livewire.vans', [
            'vans' => $this->vanService->getAll(),
        ]);
    }
}
