<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $RoleRepository;

    public function __construct(RoleRepositoryInterface $RoleRepository)
    {
        $this->RoleRepository = $RoleRepository;
    }
    public function index()
    {
        $roles = $this->RoleRepository->index();
        dd($roles);
        return view('admin.roles', compact('roles'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'role_name' => 'required|string|unique:roles|max:20',
        ],
        [
            'role_name.required' => "Role name is required",
            'role_name.unique' => "Role already exist",
        ]);


        $role = $this->RoleRepository->create($validated['role_name']);

        $roles = $this->RoleRepository->index();
        return view('admin.roles', compact('roles'));
    }
}
