<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> EnrollEase Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- layouts.includes_admin.navigation_admin -->
    <!--Navigation Admin Starts  -->
    @include('layouts.includes_admin.navigation_admin')
    <!--Navigation Admin Ends  -->

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Page content -->
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Include Bootstrap JS and any custom scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>