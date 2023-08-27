<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EnrollEase')</title> <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>



</head>
</head>

<body>
    <!-- layouts.includes_admin.navigation_admin -->
    <!--Navigation Admin Starts  -->
    @if(Auth::check())
    @include('layouts.includes_admin.navigation_admin')
    @endif

    <!--Navigation Admin Ends  -->

    <div class="container-fluid">
        <!-- Page content -->
        @yield('content')
    </div>
    @include('sweetalert::alert')
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')


</body>

</html>