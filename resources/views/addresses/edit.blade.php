<html>

<head>
    <title>Edit user</title>
    <!-- BS 5 -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100">

    <div class="flex justify-center items-center m-16">

        <div class="bg-white rounded-md shadow-md p-16 w-96">
            
            <form action="" method="post">
                    @method('put')
                    @csrf

                    <div class="flex justify-center">
                        <h1 class="font-bold text-xl py-5">Edit Address</h1>
                    </div>
                    <hr>

                    <div class="py-5">

                        <div class="mb-3">
                            <label for="name" class="font-bold">City</label>
                                <br>
                            <input type="text"  name="city" class="w-full rounded-md border-2 px-2 py-2 " id="city" placeholder="Your City"  value="{{ $address->city) }}">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="font-bold">District</label>
                            <br>
                            <input type="text"  name="district" class="w-full rounded-md border-2 px-2 py-2 " id="district" placeholder="Your District">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="font-bold">UC</label>
                                <br>
                            <input type="text"  name="uc" class="w-full rounded-md border-2 px-2 py-2 " id="uc" placeholder="Your Union Councel">
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

</body>

</html>
