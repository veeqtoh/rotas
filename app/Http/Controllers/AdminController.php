<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Services\DriverService;
use App\Services\ShiftService;
use App\Services\UserService;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function __construct(private UserService $userService,
                                private DriverService $driverService,
                                private ShiftService $shiftService)
    {
        #code
    }

    public function dashboard(): View
    {
        $allShifts = $this->shiftService->getAll();
        $allUsers = $this->userService->getAllUsers();
        return view('dashboard', [
            'allUsers' => $allUsers,
            'allShifts' => $allShifts,
        ]);
    }

    public function addDriver(): View
    {
        return view('add-driver');
    }

    public function drivers()
    {
        $allDrivers = $this->driverService->getAll();
        return view('all-drivers', [
            'allDrivers' => $allDrivers,
            'driversCount' => $allDrivers->count(),
        ]);
    }

    public function profile($user)
    {
        $userDetails = $this->userService->getUserDetails($user);
        // $colleagues = $this->userService->getUserColleagues($user);
        return view('profile', [
            'user' => $userDetails,
            // 'colleagues' => $colleagues,
        ]);
    }

    public function settings($user)
    {
        $userDetails = $this->userService->getUserDetails($user);
        // $colleagues = $this->userService->getUserColleagues($user);
        return view('settings', [
            'user' => $userDetails,
            // 'colleagues' => $colleagues,
        ]);
    }

    public function rotas(): View
    {
        $events = [];

        $shifts = Shift::with('driver')->get();

        foreach ($shifts as $shift) {
            $events[] = [
                'id' => $shift->uuid,
                'title' => $shift->driver->first_name . ' '.$shift->driver->last_name. ' ('.$shift->description.')',
                'start' => $shift->start_time,
                'end' => $shift->end_time,
            ];
        }

        return view('rotas', compact('events'));
    }

    public function addShift(): View
    {
        return view('add-shift');
    }

    public function vans(): View
    {
        return view('vans');
    }

}
