<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
use mysql_xdevapi\Collection;

class RoleRepository implements RoleRepositoryInterface
{
    public function index()
    {
        $roles = Role::all();
        return $roles;
    }

    public function create(string $name)
    {
        return Role::create([
            'role_name' => $name
        ]);
    }

    public function update($name, $id)
    {
        $Role = Role::find($id);
        $Role->role_name = $name;

        $Role->save();
    }

    public function delete($id)
    {
        $Role = Role::find($id);
        $Role->delete();
    }
}
