<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\VanService;

class Vans extends Component
{
    public $brand;
    public $model;
    public $year;
    public $reg;

    private VanService $vanService;

    public function boot(VanService $vanService)
    {
        $this->vanService = $vanService;
    }

    public function delete($id)
    {
        $this->vanService->deleteVan($id);
        $this->dispatchBrowserEvent('notify-deleted', ['van' => $id]);
        $this->emitSelf('notify-deleted');
    }

    public function update($id)
    {
        $data = [
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year,
            'reg' => $this->reg,
        ];
        $this->vanService->updateVan($id, $data);
        $this->dispatchBrowserEvent('notify-updated', ['van' => $id]);
        $this->emitSelf('notify-updated');
    }

    public function render()
    {
        return view('livewire.vans', [
            'vans' => $this->vanService->getAll(),
        ]);
    }
}
