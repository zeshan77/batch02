@extends('layouts.app')

@section('title')
    Edit Address
@endsection

@section('content')

    <div class="flex justify-center items-center m-16">

        <div class="bg-white rounded-md shadow-md p-16 w-96">
            <form action="/users/{{ $address->id }}/addresses/update" method="post">
                @method('put')
                @csrf

                <div class="flex justify-center">
                    <h1 class="font-bold text-xl py-5">Edit Addresses</h1>
                </div>
                <hr>

                @if(session()->has('message'))
                    <div class="p-2 bg-green-100 rounded-md shadow-md" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="py-5">
                    <div class="mb-3">
                        <label for="name" class="font-bold">City</label>
                        <input type="text"  name="city" class="w-full rounded-md border-2 px-2 py-2 " id="city" placeholder="Your City" value="{{ old('city', $address->city) }}">
                        @error('city')
                            <span style="font-size: small; color: indianred;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="font-bold">District</label>
                        <input type="text" class="w-full border-2 rounded-md px-2 py-2" name="district" id="district"  placeholder="Your District" value="{{ old('district', $address->district) }}">
                        @error('district')
                            <span style="font-size: small; color: indianred;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="font-bold">Union Council</label>
                        <input type="text" class="w-full border-2 rounded-md px-2 py-2" name="uc" id="uc"  placeholder="Your Union Council" value="{{ old('uc', $address->uc) }}">
                        @error('uc')
                            <span style="font-size: small; color: indianred;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-center">
                        <div class="border-2 border-gray-200 rounded-md shahdow-md py-2 px-2 text-gray-600">
                            <button type="submit" class="font-bold">Update</button>
                        </div>
                    </div>


                </div>


            </form>

        </div>

    </div>

    @endsection


@push('styles')
    <style>
        body {
            
        }
    </style>
@endpush
