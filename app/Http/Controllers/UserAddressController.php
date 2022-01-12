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
        $datas = DB::table('users')
        ->join('addresses', 'users.id', 'addresses.user_id')
        ->get();

        // echo "<pre>";
        // print_r($datas);
        // exit;
        return view('addresses.create', ['user' => $user, 'datas' => $datas]);
    }

    public function store(User $user, AddressCreateRequest $request)
    {

        $data = $request->validated();

        Address::create([
            'user_id' => $user->id,
            'city' => $data['city'],
            'district' => $data['district'],
            'uc' => $data['uc'],
        ]);

        return redirect()
            ->back()
            ->with('messege', 'Address successfully Added.');
    }

    public function edit(Address $address)
    {
        return view('addresses.edit', [
            'address' => $address
        ]);
    }

    // public function update(Address $address, Request $request)
    // {

    // }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()
            ->back()
            ->with('delete', 'User successfully deleted.');
    }
}
