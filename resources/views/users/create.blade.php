<html>

<head>
    <title>Create user</title>
    <!-- BS 5 -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100">

    <div class="flex justify-center items-center m-16">
        
        <div class="bg-white rounded-md shadow-md p-16">
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

                <div class="py-5">
                    <div class="mb-3">
                        <label for="name" class="font-bold">Name</label>
                        <br>
                        <input type="text"  name="name" class="border-2 rounded-md shadow-md border-black px-2" id="name" placeholder="Your Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="font-bold">Email address</label>
                        <br>
                        <input type="email" class="border-2 rounded-md shadow-md border-black px-2" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email">
                    </div>
                    <div class="mb-5">
                        <label for="exampleInputPassword1" class="font-bold">Password</label>
                        <br>
                        <input type="password" class="border-2 rounded-md shadow-md border-black px-2" name="password" id="exampleInputPassword1" placeholder="Your Password">
                    </div>

                    <div class="flex justify-center">
                        <div class="bg-gray-200 rounded-md shahdow-md py-2 px-2">
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

            <table>
                <thead>
                    <tr class="border-2 border-black bg-black text-white">
                        <th class="border-r-2 border-white p-2">S.No</th>
                        <th class="border-r-2 border-white p-2">Name</th>
                        <th class="border-r-2 border-white p-2">Email</th>
                        <th class="p-2">Created On</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="border-2 border-black p-2">{{ $user->id }}</td>
                                <td class="border-2 border-black p-2">{{ $user->name }}</td>
                                <td class="border-2 border-black p-2">{{ $user->email }}</td>
                                <td class="border-2 border-black p-2 ">{{ optional($user->created_at)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>

        </div>


    </div>

    
    

</body>

</html>
