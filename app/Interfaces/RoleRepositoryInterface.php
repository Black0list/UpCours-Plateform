<?php

namespace App\Interfaces;

use App\Models\Role;

interface RoleRepositoryInterface
{
    public function index();
    public function create(string $name) : Role;
}
