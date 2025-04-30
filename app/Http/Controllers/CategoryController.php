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
        return view('admin.categories', compact('categories'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ],
        [
            'name.required' => "the name is required",
            'description.required' => "the description is required",
        ]);

        $this->categoryRepo->create($data);

        return redirect()->route('admin.categories.index')->with('success', 'category created successfully');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'id' => 'required|integer'
        ]);

        $this->categoryRepo->update($data, $id);
        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {
        $this->categoryRepo->delete($id);
        return redirect()->route('admin.categories.index');
    }
}
