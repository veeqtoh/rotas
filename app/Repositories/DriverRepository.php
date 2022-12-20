<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Driver;
use Illuminate\Pagination\LengthAwarePaginator;

class DriverRepository
{
    public function __construct(private Driver $driver)
    {
        #code
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->driver->paginate(config('app.paginate'));
    }

}
