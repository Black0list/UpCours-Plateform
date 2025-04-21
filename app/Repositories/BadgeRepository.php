<?php

namespace App\Repositories;

use App\Models\Badge;
use App\Interfaces\BadgeRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class BadgeRepository implements BadgeRepositoryInterface
{
    public function all()
    {
        return Badge::with('earners')->get();
    }

    public function create(array $data)
    {
        $path = $data['icon']->store('badges', 'public');

        $Badge = new Badge();
        $Badge->badge_name = $data['badge_name'];
        $Badge->icon  = $path;

        $Badge->save();
    }

    public function update(array $data, int $id)
    {
        $badge = Badge::find($id);
        $badge->badge_name = $data['badge_name'];
        $badge->icon = $data['icon']->store('badges', 'public');

        $badge->save();
        return $badge;
    }

    public function delete($id)
    {
        $badge = Badge::find($id);
        return $badge->delete();
    }
}
