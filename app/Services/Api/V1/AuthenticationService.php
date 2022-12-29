<?php
declare(strict_types=1);

namespace App\Services\Api\V1;

use stdClass;
use Carbon\Carbon;
use App\Models\User;
use App\Http\VeeqPayload;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Api\V1\UserResource;
use App\Http\Resources\Api\V1\ShiftCollection;

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
            $this->checkPasswordIsChanged($password);
            $this->payload->setPayload(true, 'Login successful', $this->userDetails($user));
        }
        return $this->payload;
    }

    public function checkPasswordIsChanged(string $password): void
    {
        if ($password == 'Pass2022') {
            abort(response(['status' => false,
                            'message' => 'Please change your password to proceed.'], 409));
        }
    }

    public function userDetails(User $user): array
    {
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek(Carbon::SUNDAY)->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek(Carbon::SATURDAY)->format('Y-m-d H:i');

        return  [
            'auth_token' => $this->createAuthToken($user),
            'user' => UserResource::make($user),
            'shifts' => ShiftCollection::make($user->driver->shifts->whereBetween('start_time', [$weekStartDate, $weekEndDate] )->sortByDesc('start_time')),
            // 'permissions' => $user->getAllPermissions()
        ];
    }

    private function createAuthToken(User $user): string
    {
        $permissions = [];
        return $user->createToken(config('auth.token_name'), $permissions)->plainTextToken;
    }

    public function changePassword(?User $user, string $currentPassword, string $newPassword): VeeqPayload
    {
        if (!$user) {
            return $this->payload->setPayload(false, 'Invalid username or email');
        }elseif (! Hash::check($currentPassword, $user->password)) {
            return $this->payload->setPayload(false, 'Invalid current password');
        }elseif ($newPassword == 'Pass2022') {
            return $this->payload->setPayload(false, 'Please provide a different password');
        }

        $this->userRepository->updatePassword($user, $newPassword);
        return $this->payload->setPayload(true, 'Password changed successfully', $this->userDetails($user));
    }

    public function invalidateTokens(User $user): VeeqPayload
    {
        $user->tokens()->delete();
        $this->payload->setPayload(true, 'Logout successful');
        return $this->payload;
    }
}
