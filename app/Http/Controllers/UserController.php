<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::get();
    }


    public function show(User $user)
    {
        return $user;
    }

    public function create()
    {
        $users = User::with('roles')->get();

        return view('users.create', [
            'users' => $users
        ]);
    }

    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->back()->with('message', 'User successfully created.');

    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect('/users/create')
            ->with('delete', 'User successfully updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->back()
            ->with('delete', 'User successfully deleted.');
    }

}

