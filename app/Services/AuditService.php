<?php
declare(strict_types = 1);

namespace App\Services;

use App\Models\Audit;
use App\Repositories\AuditRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class AuditService
{
    public function __construct(private AuditRepository $auditRepository)
    {
        #code
    }

    public function getAllAudits(int $id): LengthAwarePaginator
    {
        return $this->auditRepository->getAll($id);
    }

    public function storeAudit(array $data): Audit
    {
        return $this->auditRepository->store($data);
    }
}
