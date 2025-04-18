<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepo->all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:255'
        ]);

        $this->categoryRepo->create($data);
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->categoryRepo->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:255'
        ]);

        $this->categoryRepo->update($id, $data);
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $this->categoryRepo->delete($id);
        return redirect()->route('admin.categories.index');
    }
}
