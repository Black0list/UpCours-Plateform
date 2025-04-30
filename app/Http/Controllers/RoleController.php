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
        return view('admin.roles', compact('roles'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'role_name' => 'required|string|unique:roles|max:20',
        ],
        [
            'role_name.required' => "Role name is required",
            'role_name.unique' => "Role already exist",
        ]);


        $this->RoleRepository->create($data['role_name']);

        return redirect()->back()->with('success', 'Role created successfully');
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'role_name' => 'required|string|unique:roles|max:20',
        ],
        [
            'role_name.required' => "Role name is required",
            'role_name.unique' => "Role already exist",
        ]);

        $this->RoleRepository->update($data['role_name'], $id);
        return redirect()->back()->with('success', 'Role updated successfully');
    }

    public function delete($id)
    {
        $this->RoleRepository->delete($id);
        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
