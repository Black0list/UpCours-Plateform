<?php

namespace App\Http\Controllers;

use App\Interfaces\BadgeRepositoryInterface;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    protected $badgeRepo;

    public function __construct(BadgeRepositoryInterface $badgeRepo)
    {
        $this->badgeRepo = $badgeRepo;
    }

    public function index()
    {
        $badges = $this->badgeRepo->all();
        return view('admin.badges.index', compact('badges'));
    }

    public function create()
    {
        return view('admin.badges.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'badge_name' => 'required|string|max:255',
            'icon' => 'required|string|max:255'
        ]);

        $this->badgeRepo->create($data);
        return redirect()->route('admin.badges.index');
    }

    public function edit($id)
    {
        $badge = $this->badgeRepo->find($id);
        return view('admin.badges.edit', compact('badge'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'badge_name' => 'required|string|max:255',
            'icon' => 'required|string|max:255'
        ]);

        $this->badgeRepo->update($id, $data);
        return redirect()->route('admin.badges.index');
    }

    public function destroy($id)
    {
        $this->badgeRepo->delete($id);
        return redirect()->route('admin.badges.index');
    }
}
