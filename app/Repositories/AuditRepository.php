<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Audit;
use Illuminate\Pagination\LengthAwarePaginator;

class AuditRepository
{
    public function __construct(private Audit $audit)
    {
        #code
    }

    public function getAll(int $user_id): LengthAwarePaginator
    {
        return $this->audit->whereUserId($user_id)->latest()->paginate(config('app.paginate'));
    }

    public function store(array $data): Audit
    {
        return $this->audit->create($data);
    }
}
