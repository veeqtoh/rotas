<?php
declare(strict_types=1);

namespace App\Services\Api\V1;

use stdClass;
use App\Models\User;
use App\Http\VeeqPayload;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
    public function __construct(private UserRepository $userRepository, private readonly VeeqPayload $payload)
    {
        #code
    }

    public function login(?User $user, string $password): VeeqPayload
    {
        if (!$user || Hash::check($password, $user->password)) {
            $this->payload->setPayload(false, 'Invalid credentials', new stdClass());
        } else {

        }
        return $this->payload;
    }



    public function invalidateTokens(User $user): VeeqPayload
    {
        $user->tokens()->delete();
        $this->payload->setPayload(true, 'Logout successful');
        return $this->payload;
    }
}
