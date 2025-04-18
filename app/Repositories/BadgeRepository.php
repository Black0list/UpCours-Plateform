<?php

namespace App\Repositories;

use App\Models\Badge;
use App\Interfaces\BadgeRepositoryInterface;

class BadgeRepository implements BadgeRepositoryInterface
{
    public function all()
    {
        return Badge::all();
    }

    public function find($id)
    {
        return Badge::findOrFail($id);
    }

    public function create(array $data)
    {
        return Badge::create($data);
    }

    public function update($id, array $data)
    {
        $badge = $this->find($id);
        $badge->update($data);
        return $badge;
    }

    public function delete($id)
    {
        $badge = $this->find($id);
        return $badge->delete();
    }
}
