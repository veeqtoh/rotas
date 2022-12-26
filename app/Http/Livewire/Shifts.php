<?php

namespace App\Http\Livewire;

use App\Models\Shift;
use Livewire\Component;
use App\Services\VanService;
use App\Services\DriverService;

class Shifts extends Component
{
    private VanService $vanService;
    private DriverService $driverService;

    public $driver_id, $van_id, $dates, $description;
    public $inputs = [];
    public $i = 1;

    protected $messages = [
        'driver_id.0.required' => 'Please select a driver',
        'van_id.0.required' => 'Please select a van',
        'dates.0.required' => 'A valid date and time is required',
        'description.0.required' => 'Description is required',
    ];

    public function boot(VanService $vanService, DriverService $driverService)
    {
        $this->vanService = $vanService;
        $this->driverService = $driverService;
    }

    public function create()
    {
        // dd(explode("to", $this->dates[0]));
        $this->validate([
            'driver_id.0' => 'required',
            'van_id.0' => 'required',
            'dates.0' => 'required',
            'description.0' => 'required',
        ]);

        foreach ($this->driver_id as $key => $value) {

            $exploded = explode("to", $this->dates[0]);

            Shift::create([
                'driver_id' => !empty($this->driver_id[$key]) ? $this->driver_id[$key] : '',
                'van_id' => !empty($this->van_id[$key]) ? $this->van_id[$key] : '',
                'start_time' => $exploded[0],
                'end_time' => $exploded[1],
                'description' => !empty($this->description[$key]) ? $this->description[$key] : '',
            ]);
        }

        // event(new DriverCreatedEvent($user));
        return redirect()->route('rotas');
        // $this->reset();
        // $this->emitSelf('notify-saved');

    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        return view('livewire.shifts', [
            'drivers' => $this->driverService->getAll(),
            'vans' => $this->vanService->getAll(),
        ]);
    }
}
