<?php

namespace App\Interfaces;

use App\Models\Role;

interface RoleRepositoryInterface
{
    public function index();
    public function create(string $name);
    public function update(string $name, int $id);
    public function delete(string $name);
}
