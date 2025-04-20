<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }

    public function create(array $data)
    {
        $category = new Category();
        $category->name = $data['name'];
        $category->description = $data['description'];

        $category->save();

        return $category;
    }

    public function update(array $data, $id)
    {
        $category = Category::find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
