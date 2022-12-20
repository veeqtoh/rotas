<?php
declare(strict_types=1);

namespace App\Services;

class DriverService
{
    public function __construct(private DriverRepository $driverRepository)
    {
        #code
    }

    public function getAll(): Collection
    {
        return $this->driverRepository->getAll();
    }


}