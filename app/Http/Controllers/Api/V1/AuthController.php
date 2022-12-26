<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ChangePasswordRequest;
use App\Http\Requests\Api\V1\LoginRequest;
use App\Repositories\UserRepository;
use App\Services\Api\V1\AuthenticationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class AuthController extends Controller
{
    public function __construct(private UserRepository $userRepository, private AuthenticationService $authService)
    {
        #code
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->userRepository->getByEmailOrUsername($request->post('field'));
        $responseData = $this->authService->login($user, $request->post('password'));
        if(response()->json($responseData)->getData()->success == false)
        {
            return response()->json($responseData, ResponseConstant::HTTP_FORBIDDEN);
        }
        return response()->json($responseData, ResponseConstant::HTTP_OK);
    }

    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $user = $this->userRepository->getByEmailOrUsername($request->post('field'));
        $responseData = $this->authService->changePassword($user, $request->post('currentPassword'), $request->post('newPassword'));
        if(response()->json($responseData)->getData()->success == false)
        {
            return response()->json($responseData, ResponseConstant::HTTP_FORBIDDEN);
        }
        return response()->json($responseData, ResponseConstant::HTTP_OK);
    }

    public function logout(): JsonResponse
    {
        $user = auth()->user();
        $this->authService->invalidateTokens($user);
        return response()->json(['message' => 'Logout successful'], ResponseConstant::HTTP_OK);
    }

}
