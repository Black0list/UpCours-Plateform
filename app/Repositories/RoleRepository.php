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

    public function create(string $name) : Role
    {
        return Role::create([
            'role_name' => $name
        ]);
    }
}
