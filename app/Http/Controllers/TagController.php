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
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $this->tagRepo->create($data);
        return redirect()->route('admin.tags.index');
    }

    public function edit($id)
    {
        $tag = $this->tagRepo->find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $this->tagRepo->update($id, $data);
        return redirect()->route('admin.tags.index');
    }

    public function destroy($id)
    {
        $this->tagRepo->delete($id);
        return redirect()->route('admin.tags.index');
    }
}
