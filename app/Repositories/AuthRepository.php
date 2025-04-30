<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{
    protected $RoleRepository;
    protected $UserRepository;

    public function __construct(RoleRepositoryInterface $RoleRepository, UserRepositoryInterface $UserRepository)
    {
        $this->RoleRepository = $RoleRepository;
        $this->UserRepository = $UserRepository;
    }
    public function register(array $data)
    {
        $role = Role::whereRaw('LOWER(role_name) = ?', $data['role'])->first();

        if (!$role) {
            $role = $this->RoleRepository->create($data['role'], "Description of {$data['role']}");
        }

        $isPending = false;
        if(strtolower($role->role_name) == 'teacher')
        {
            $isPending = true;
        }

        $data['status'] = $isPending;
        $data['role'] = $role;

        $this->UserRepository->create($data);
    }

    public function login($data)
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return false;
        }

        return $user;
    }

    public function logout()
    {
        Auth::logout();
    }

}
