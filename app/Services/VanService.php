<?php
declare(strict_types = 1);

namespace App\Services;

use App\Repositories\VanRepository;

class VanService
{
    public function __construct(private VanRepository $vanRepository)
    {
        #code
    }

    public function getAll()
    {
        return $this->vanRepository->getAll();
    }
}
