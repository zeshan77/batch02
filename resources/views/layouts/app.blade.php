<html>

<head>
    <title>@yield('title')</title>
    <!-- BS 5 -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')

</head>

<body class="bg-gray-100">
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    @stack('js')
</body>
</html>
