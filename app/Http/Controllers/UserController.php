<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('message', 'User successfully created.');

    }

}
