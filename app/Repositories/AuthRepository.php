<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{
    protected $RoleRepository;

    public function __construct(RoleRepositoryInterface $RoleRepository)
    {
        $this->RoleRepository = $RoleRepository;
    }
    public function register(array $data)
    {
        $role = Role::whereRaw('LOWER(role_name) = ?', $data['role'])->first();

        if (!$role) {
            $role = $this->RoleRepository->create($data['role'], "Description of {$data['role']}");
        }

        $isPending = false;
        if($role->role_name == 'teacher')
        {
            $isPending = true;
        }

        $user = new User();
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->photo = "icons/user.png";
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->isPending = $isPending;
        $user->role()->associate($role);

        $user->save();
    }

    public function login(array $data)
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return false;
        }

        Auth::login($user);
        return $user;
    }

    public function logout()
    {
        Auth::logout();
    }

    public function profile()
    {
        return Auth::user();
    }
}
