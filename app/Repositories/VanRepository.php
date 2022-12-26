<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Van;
use Illuminate\Pagination\LengthAwarePaginator;

class VanRepository
{
    public function __construct(private Van $van)
    {
        #code
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->van->latest()->paginate(config('app.paginate'));
    }

    public function getByUuId($uuid): van
    {
        return $this->van->whereUuid($uuid)->firstOrFail();
    }

}
