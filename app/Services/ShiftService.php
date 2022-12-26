<?php
declare(strict_types = 1);

namespace App\Services;

use App\Repositories\ShiftRepository;

class ShiftService
{
    public function __construct(private ShiftRepository $shiftRepository)
    {
        #code
    }

    public function getAll()
    {
        return $this->shiftRepository->getAll();
    }
}
