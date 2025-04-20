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
        $tag = new Tag();
        $tag->name = $data['name'];

        $tag->save();

        return $tag;
    }

    public function update(array $data, $id)
    {
        $tag = Tag::find($id);
        $tag->update($data);
        return $tag;
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
    }
}
