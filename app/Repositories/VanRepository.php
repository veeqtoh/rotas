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

    public function getById($id): van
    {
        return $this->van->whereId($id)->firstOrFail();
    }

    public function destroy(int $id)
    {
        $van = $this->getById($id);
        return $van->delete();
    }

    public function update(int $id, array $data)
    {
        $van = $this->getById($id);
        $van->update($data);
        return $van->save();
    }

    public function save(array $data)
    {
        return $this->van->create($data);
    }

}
