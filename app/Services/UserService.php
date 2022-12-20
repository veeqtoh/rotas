<?php
declare(strict_types = 1);

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function __construct(protected UserRepository $userRepository)
    {
        #code
    }

    public function getAllUsers(): LengthAwarePaginator
    {
        return $this->userRepository->getAll();
    }

    public function getAllDrivers(): LengthAwarePaginator
    {
        return $this->userRepository->getDrivers();
    }

    public function getAllAdmin(): LengthAwarePaginator
    {
        return $this->userRepository->getAdmin();
    }

    public function getAllInactive(): LengthAwarePaginator
    {
        return $this->userRepository->getInactive();
    }

    public function saveUser(array $data): bool
    {
        return $this->userRepository->save($data);
    }

    public function getUserDetails($user): User
    {
        return $this->userRepository->getDetails($user);
    }

    public function getUserColleagues($user)
    {
        return $this->userRepository->getColleagues($user);
    }

    public function updateStaffUser($id, $data)
    {
        return $this->userRepository->updateStaff($id, $data);
    }

    public function updatePassword($password)
    {
        return $this->userRepository->updatePassword($password);
    }
}
