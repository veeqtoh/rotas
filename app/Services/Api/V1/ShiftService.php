<?php
declare(strict_types = 1);

namespace App\Services\Api\V1;

use App\Http\VeeqPayload;
use App\Repositories\ShiftRepository;

class ShiftService
{
    public function __construct(private ShiftRepository $shiftRepository, private VeeqPayload $payload)
    {
        #code
    }

    public function startShift(string $uuid, $clock_in_time, $clock_in_ip): VeeqPayload
    {
        $this->shiftRepository->start($uuid, $clock_in_time, $clock_in_ip);
        $this->payload->setPayload(true, 'Shift started');
        return $this->payload;
    }

    public function endShift(string $uuid, $clock_out_time, $clock_out_ip): VeeqPayload
    {
        $this->shiftRepository->end($uuid, $clock_out_time, $clock_out_ip);
        $this->payload->setPayload(true, 'Shift ended');
        return $this->payload;
    }
}
