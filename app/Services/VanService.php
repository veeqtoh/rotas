<?php
declare(strict_types = 1);

namespace App\Services;

use App\Models\Van;
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

    public function getById(int $id)
    {
        return $this->vanRepository->getById($id);
    }

    public function deleteVan(int $id)
    {
        return $this->vanRepository->destroy($id);
    }

    public function updateVan(int $id, array $data)
    {
        return $this->vanRepository->update($id, $data);
    }

    public function addVan(array $data)
    {
        return $this->vanRepository->save($data);
    }
}
