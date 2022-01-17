<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RollCreateRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;


class UserRoleController extends Controller
{
    public function index()
    {
        return Role::get();
    }

    public function attach(User $user)
    {
        $user->load('roles');
        $roles = Role::get();

        return view('roles.attach', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function store(User $user, RoleCreateRequest $request)
    {  
        $user->roles()->sync($request->safe()->roles);

        return redirect()
            ->route('users.create')
            ->with('message', 'Role successfully Added.');
    }
}
