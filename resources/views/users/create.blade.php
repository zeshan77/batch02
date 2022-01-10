<html>

<head>
    <title>Create user</title>
    <!-- BS 5 -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100">

    <div class="flex justify-center items-center m-16">

        <div class="bg-white rounded-md shadow-md p-16 w-96">
            <form action="/users" method="post">
                @csrf

                <div class="flex justify-center">
                    <h1 class="font-bold text-xl py-5">Create a user</h1>
                </div>


                <hr>

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

                <div class="py-5">
                    <div class="mb-3">
                        <label for="name" class="font-bold">Name</label>
                        <br>
                        <input type="text"  name="name" class="w-full rounded-md border-2 px-2 py-2 " id="name" placeholder="Your Name" value="{{ old('name') }}">
                        @error('name')
                            <span style="font-size: small; color: indianred;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="font-bold">Email address</label>
                        <br>
                        <input type="email" class="w-full border-2 rounded-md px-2 py-2" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email" value="{{ old('email') }}">
                        @error('email')
                            <span style="font-size: small; color: indianred;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="exampleInputPassword1" class="font-bold">Password</label>
                        <br>
                        <input type="password" class="w-full border-2 rounded-md px-2 py-2" name="password" id="exampleInputPassword1" placeholder="Your Password">
                        @error('password')
                            <span style="font-size: small; color: indianred;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-center">
                        <div class="border-2 border-gray-200 rounded-md shahdow-md py-2 px-2 text-gray-600">
                            <button type="submit" class="font-bold">Submit</button>
                        </div>
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
                        <th class="p-2">Created On</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="border-2 p-2">{{ $user->id }}</td>
                                <td class="border-2 p-2">{{ $user->name }}</td>
                                <td class="border-2 p-2">{{ $user->email }}</td>
                                <td class="border-2 p-2 ">{{ optional($user->created_at)->diffForHumans() }}</td>
                                <td class="border-2 p-2">
                                    <a href="/users/{{ $user->id }}/delete">Delete</a> -
                                    <a href="/users/{{ $user->id }}/edit">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>

        </div>


    </div>




</body>

</html>
