<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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
        $response = $this->authService->login($user, $request->post('password'));
        return response()->json($response, ResponseConstant::HTTP_OK);
    }
}
