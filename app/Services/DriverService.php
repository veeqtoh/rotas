<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\DriverRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class DriverService
{
    public function __construct(private DriverRepository $driverRepository)
    {
        #code
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->driverRepository->getAll();
    }


}
