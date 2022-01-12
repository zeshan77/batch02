<!DOCTYPE html>
<html lang="en">
<head>

    <title>Adding Address</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</head>
<body class="bg-gray-100">

    <div class="flex justify-center items-center m-16">

        <div class="bg-white rounded-md shadow-md p-16 w-96">

            <form action="/users/{{ $user->id }}/addresses" method="post">
            @csrf
                    <div class="flex justify-center">
                        <h1 class="font-bold text-xl py-5">Address</h1>
                    </div>

                    <hr class="mb-2">

                    @if(session()->has('message'))
                        <div class="p-2 bg-green-100 rounded-md shadow-md" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

{{--                @if($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}


                    <div class="mb-3">
                        <label for="name" class="font-bold">City</label>
                            <br>
                    <input type="text"  name="city" class="w-full rounded-md border-2 px-2 py-2 " id="city" placeholder="Your City">
                    </div>

                        @error('city')
                            <span style="font-size: small; color: indianred;">{{ $message }}</span>
                        @enderror

                    <div class="mb-3">
                        <label for="name" class="font-bold">District</label>
                            <br>
                    <input type="text"  name="district" class="w-full rounded-md border-2 px-2 py-2 " id="district" placeholder="Your District">
                    </div>

                        @error('district')
                            <span style="font-size: small; color: indianred;">{{ $message }}</span>
                        @enderror

                    <div class="mb-3">
                        <label for="name" class="font-bold">UC</label>
                            <br>
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
                <h1 class="font-bold text-xl py-5">User Table</h1>
            </div>

            <hr class="py-2">


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
                        @foreach($datas as $data)
                            <tr>
                                <td class="border-2 p-2">{{ $data->id }}</td>
                                <td class="border-2 p-2">{{ $data->name }}</td>
                                <td class="border-2 p-2">{{ $data->email }}</td>
                                <td class="border-2 p-2">{{ $data->city." ".$data->district." ".$data->uc }}</td>
                                <td class="border-2 p-2 ">{{ optional($data->created_at)->diffForHumans() }}</td>
                                <td class="border-2 p-2">
                                    <a href="/users/{{ $data->user_id }}/addresses/delete">Delete</a> -
                                    <a href="/users/{{ $data->user_id }}/addresses/edit">Edit</a> - 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>

        </div>


    </div>
    
    

</body>
</html>