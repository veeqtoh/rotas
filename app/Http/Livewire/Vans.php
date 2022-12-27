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

    protected $messages = [
        'brand.required' => 'A brand name is required',
        'model.required' => 'The brand model is required',
        'year.required' =>'The brand year is required',
        'reg.required' =>'A van reg number is required',
    ];

    public function boot(VanService $vanService)
    {
        $this->vanService = $vanService;
    }

    public function delete($id)
    {
        $this->vanService->deleteVan($id);
        $this->reset();
        $this->dispatchBrowserEvent('notify-deleted', ['van' => $id]);
        $this->emitSelf('notify-deleted');
    }

    public function update($id)
    {
    $data = [];
        if(isset($this->brand)){
            $data = [
                'brand' => $this->brand,
            ];
        }if(isset($this->model)){
            $data = [
                'model' => $this->model,
            ];
        }if(isset($this->year)){
            $data = [
                'year' => $this->year,
            ];
        }if(isset($this->year)){
            $data = [
                'year' => $this->year,
            ];
        }

        $this->vanService->updateVan($id, $data);
        $this->reset();
        $this->dispatchBrowserEvent('notify-updated', ['van' => $id]);
        $this->emitSelf('notify-updated');
    }

    public function addVan()
    {
        $this->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' =>'required',
            'reg' =>'required',
        ]);

        $data = [
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year,
            'reg' => $this->reg,
        ];

        $this->vanService->addVan($data);
        $this->reset();
        $this->dispatchBrowserEvent('notify-created');
        $this->emitSelf('notify-created');

    }

    public function render()
    {
        return view('livewire.vans', [
            'vans' => $this->vanService->getAll(),
        ]);
    }
}
