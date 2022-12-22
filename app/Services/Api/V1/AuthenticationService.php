<?php
declare(strict_types=1);

namespace App\Services\Api\V1;

use stdClass;
use App\Models\User;
use App\Http\VeeqPayload;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Api\V1\UserResource;

class AuthenticationService
{
    public function __construct(private UserRepository $userRepository, private readonly VeeqPayload $payload)
    {
        #code
    }

    public function login(?User $user, string $password): VeeqPayload
    {
        if (!$user || ! Hash::check($password, $user->password)) {
            $this->payload->setPayload(false, 'Invalid credentials', new stdClass());
        } else {
            $this->checkPasswordIsChanged($user);
            $this->payload->setPayload(true, 'Login successful', $this->userDetails($user));
        }
        return $this->payload;
    }

    public function checkPasswordIsChanged(?User $user): void
    {
        if (!Hash::check($user->password, 'Pass2022')) {
            abort(response('Please change your password to proceed.', 403));
        }
    }

    public function userDetails(User $user): array
    {
        return  [
            'auth_token' => $this->createAuthToken($user),
            'user' => UserResource::make($user),
            'shifts' => $user->driver->shifts(),
            // 'permissions' => $user->getAllPermissions()
        ];
    }

    private function createAuthToken(User $user): string
    {
        $permissions = [];
        return $user->createToken(config('auth.token_name'), $permissions)->plainTextToken;
    }

    public function changePassword(string $currentPassword, string $newPassword): VeeqPayload
    {
        if (! Hash::check($currentPassword, auth()->user()->getAuthPassword())) {
            return $this->payload->setPayload(false, 'Invalid current password');
        }

        $this->userRepository->updatePassword($newPassword);
        return $this->payload->setPayload(true, 'Password changed successfully');
    }

    public function invalidateTokens(User $user): VeeqPayload
    {
        $user->tokens()->delete();
        $this->payload->setPayload(true, 'Logout successful');
        return $this->payload;
    }
}
