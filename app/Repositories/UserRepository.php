<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository
{
    public function __construct(protected User $user)
    {
        # code...
    }

    public function getById($id): User
    {
        return $this->user->findorFail($id);
    }

    public function getByEmailOrUsername(string $field)
    {
        return $this->user->where('email', $field)->orWhere('username', $field)->first();
    }

    public function getAll(): ?LengthAwarePaginator
    {
        return $this->user->latest()->paginate(config('app.paginate'));
    }

    public function getAdmin(): ?LengthAwarePaginator
    {
        return $this->user->where('role', 'driver')->latest()->paginate(config('app.paginate'));
    }

    public function getDriver(): ?LengthAwarePaginator
    {
        return $this->user->where('role', 'driver')->latest()->paginate(config('app.paginate'));
    }

    public function getInactive(): ?LengthAwarePaginator
    {
        return $this->user->where('email_verified_at', NULL)->latest()->paginate(config('app.paginate'));
    }

    public function save(array $data): bool
    {
        $user = $this->user->create($data);
        return $user->fresh();
    }

    public function getDetails($user): User
    {
        return $this->user->whereUuid($user)->firstOrfail();
    }

    public function getColleagues($user): ?LengthAwarePaginator
    {
        return $this->user->where('department_id', $this->getDetails($user)->department_id)
                            ->where('id', '!=', $this->getDetails($user)->id)
                            ->paginate(config('app.paginate'));
    }

    public function updateStaff($id, $data)
    {
        $user = $this->user->getById($id);
        $user->update($data);
        return $user->staff->update($data);
    }

    public function updatePassword(?User $user, string $password)
    {
        $user = $this->getById($user->id);
        return $user->update(['password' => Hash::make($password)]);
    }
}
