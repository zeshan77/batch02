<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::get();
    }


    public function show($id)
    {
        return User::where('id', $id)->first();
    }

    public function create()
    {
        $users = User::get();
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

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()
            ->back()
            ->with('delete', 'User successfully deleted.');
    }

}
