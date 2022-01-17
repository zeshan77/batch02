@extends('layouts.app')

@section('title')
    Role Form
@endsection

@section('content')
    <div class="flex justify-center items-center m-16">
        <div class="bg-white rounded-md shadow-md p-16 w-96">

            <form action="/users/{{ $user->id }}/roles" method="post">
                @csrf
                <div class="flex justify-center">
                    <h1 class="font-bold text-xl py-5 my-1">Roles</h1>
                </div>
                <hr class="mb-2">

              @if($errors->any())
               <div class="text-red-500 text-sm">
                      <ul>
                       @foreach($errors->all() as $error)
                               <li>{{ $error }}</li>
                         @endforeach
                       </ul>
                  </div>
                @endif

                @if(session()->has('message'))
                    <div class="p-2 bg-green-100 rounded-md shadow-md" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="name" class="font-bold">Roles</label>
                    <select class="w-full rounded-md border-2 px-2 py-2 " name="roles[]" id="roles" multiple>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->roles->contains('id', $role->id) ? 'selected' : ''}} >
                                {{ $role->name }}
                            </option>           
                        @endforeach
                    </select>
                </div>
                    @error('roles')
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

</div>
@endsection


