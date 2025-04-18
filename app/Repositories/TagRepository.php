<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Interfaces\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    public function all()
    {
        return Tag::all();
    }

    public function find($id)
    {
        return Tag::findOrFail($id);
    }

    public function create(array $data)
    {
        return Tag::create($data);
    }

    public function update($id, array $data)
    {
        $tag = $this->find($id);
        $tag->update($data);
        return $tag;
    }

    public function delete($id)
    {
        $tag = $this->find($id);
        return $tag->delete();
    }
}
