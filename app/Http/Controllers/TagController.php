<?php

namespace App\Http\Controllers;

use App\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagRepo;

    public function __construct(TagRepositoryInterface $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    public function index()
    {
        $tags = $this->tagRepo->all();
        return view('admin.tags', compact('tags'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'The name is required',
        ]);

        $this->tagRepo->create($data);

        return redirect()->route('admin.tags.index')->with('success', 'Tag created successfully');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'id' => 'required|integer',
        ]);

        $this->tagRepo->update($data, $id);

        return redirect()->route('admin.tags.index');
    }

    public function delete($id)
    {
        $this->tagRepo->delete($id);
        return redirect()->route('admin.tags.index');
    }
}
