<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EnrollEase')</title> <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include Bootstrap JS and any custom scripts -->
    @include('sweetalert::alert')

</body>

</html>