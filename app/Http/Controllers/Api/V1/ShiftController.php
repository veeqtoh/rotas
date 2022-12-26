<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Api\V1\ShiftService;
use App\Http\Requests\Api\V1\ShiftRequest;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class ShiftController extends Controller
{
    public function __construct(private ShiftService $shiftService)
    {
        #code
    }

    public function startShift(ShiftRequest $request)
    {
        $responseData = $this->shiftService->startShift($request->post('shiftUuid'), $request->post('clockInTime'), $request->post('clockInIp'));
        return response()->json($responseData, ResponseConstant::HTTP_OK);
    }

    public function endShift(ShiftRequest $request): JsonResponse
    {
        $responseData = $this->shiftService->endShift($request->post('shiftUuid'), $request->post('clockOutTime'), $request->post('clockOutIp'));
        return response()->json($responseData, ResponseConstant::HTTP_OK);
    }

}
