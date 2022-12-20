<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Driver;

class DriverRepository
{
    public function __construct(private Driver $driver)
    {
        #code
    }

}
