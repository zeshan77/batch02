@extends('layouts.my')

@section('title')
    Address Form
@endsection

@section('content')
    <div class="flex justify-center items-center m-16">

        <div class="bg-white rounded-md shadow-md p-16 w-96">

            <form action="/users/{{ $user->id }}/addresses" method="post">
                @csrf
                <div class="flex justify-center">
                    <h1 class="font-bold text-xl py-5 my-1">Address</h1>
                </div>

                <hr class="mb-2">

                @if(session()->has('message'))
                    <div class="p-2 bg-green-100 rounded-md shadow-md" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="name" class="font-bold">City</label>
                    <input type="text"  name="city" class="w-full rounded-md border-2 px-2 py-2 " id="city" placeholder="Your City">
                </div>

                    @error('city')
                        <span style="font-size: small; color: indianred;">{{ $message }}</span>
                    @enderror

                <div class="mb-3">
                    <label for="name" class="font-bold">District</label>
                    <input type="text"  name="district" class="w-full rounded-md border-2 px-2 py-2 " id="district" placeholder="Your District">
                </div>

                    @error('district')
                        <span style="font-size: small; color: indianred;">{{ $message }}</span>
                    @enderror

                <div class="mb-3">
                    <label for="name" class="font-bold">UC</label>
                    <input type="text"  name="uc" class="w-full rounded-md border-2 px-2 py-2 " id="uc" placeholder="Your Union Councel">
                </div>

                    @error('uc')
                        <span style="font-size: small; color: indianred;">{{ $message }}</span>
                    @enderror

                <div class="flex justify-center">
                    <div class="border-2 border-gray-200 rounded-md shahdow-md py-2 px-2 text-gray-600">
                        <button type="submit" class="font-bold">Submit</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <div class="flex justify-center items-center m-16">

    <div class="bg-white rounded-md shadow-md p-16">

        <div class="flex justify-center">
            <h1 class="font-bold text-xl py-5">Adresses Table</h1>
        </div>

        <hr class="py-2">
            @if(session()->has('delete'))
                <div class="p-2 mb-4 bg-green-100 rounded-md shadow-md" role="alert">
                    {{ session('delete') }}
                </div>
            @endif


        <table>
            <thead>
                <tr class="border-2 border-black bg-black text-white">
                    <th class="border-r-2 border-white p-2">S.No</th>
                    <th class="border-r-2 border-white p-2">Name</th>
                    <th class="border-r-2 border-white p-2">Email</th>
                    <th class="border-r-2 border-white p-2">Address</th>
                    <th class="border-r-2 border-white p-2">Created On</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($user->addresses as $address)
                        <tr>
                            <td class="border-2 p-2">{{ $address->id }}</td>
                            <td class="border-2 p-2">{{ $address->user->name }}</td>
                            <td class="border-2 p-2">{{ $address->user->email }}</td>
                            <td class="border-2 p-2">{{ $address->city." ".$address->district." ".$address->uc }}</td>
                            <td class="border-2 p-2 ">{{ optional($address->created_at)->diffForHumans() }}</td>
                            <td class="border-2 p-2">
                                <a href="/addresses/{{ $address->id }}/delete">Delete</a> -
                                <a href="/addresses/{{ $address->id }}/edit">Edit</a> -
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>

    </div>


</div>
@endsection


