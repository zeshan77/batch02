<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressCreateRequest;
use App\Http\Requests\UserCreateRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAddressController extends Controller
{
    public function index()
    {
        return Address::get();
    }

     public function create(User $user)
    {
        $user->load('addresses');

        return view('addresses.create', ['user' => $user]);
    }

    public function store(User $user, AddressCreateRequest $request)
    {

        $data = $request->validated();

        $user->addresses()->create([
            'city' => $data['city'],
            'district' => $data['district'],
            'uc' => $data['uc'],
        ]);

        return redirect()
            ->back()
            ->with('message', 'Address successfully Added.');
    }

    public function edit(Address $address)
    {
        return view('addresses.edit', [
            'address' => $address
        ]);
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()
            ->back()
            ->with('delete', 'User successfully deleted.');
    }
}
