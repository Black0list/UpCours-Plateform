<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BadgeRepositoryInterface;
use App\Repositories\BadgeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Badge;

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
        return view('admin.badges', compact('badges'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'badge_name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $this->badgeRepo->create($data);

        return redirect()->back()->with('success', 'Badge created successfully.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'badge_name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $this->badgeRepo->update($data, $id);

        return redirect()->back()->with('success', 'Badge updated successfully.');
    }

    public function delete($id)
    {
        $this->badgeRepo->delete($id);
        return redirect()->back()->with('success', 'Badge deleted successfully.');
    }
}
