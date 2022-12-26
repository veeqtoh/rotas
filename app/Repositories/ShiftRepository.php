<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Shift;
use Illuminate\Pagination\LengthAwarePaginator;

class ShiftRepository
{
    public function __construct(private Shift $shift)
    {
        #code
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->shift->latest()->paginate(config('app.paginate'));
    }

    public function getByUuId($uuid): Shift
    {
        return $this->shift->whereUuid($uuid)->firstOrFail();
    }

    public function start($uuid, $clock_in_time, $clock_in_ip)
    {
        $shift = $this->getByUuId($uuid);
        $shift->update([
            'clock_in_time' => $clock_in_time,
            'clock_in_ip' => $clock_in_ip,
        ]);
        $shift->save();
        return $shift;
    }

    public function end($uuid, $clock_out_time, $clock_out_ip)
    {
        $shift = $this->getByUuId($uuid);
        $shift->update([
            'clock_out_time' => $clock_out_time,
            'clock_out_ip' => $clock_out_ip,
        ]);
        $shift->save();
        return $shift;
    }
}
