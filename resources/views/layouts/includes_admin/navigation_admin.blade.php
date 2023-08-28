<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">EnrollEase System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('enrollmentform')}}">Enrollment</a>
                </li>

                <li class="nav-item">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span> Records </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('rejectRecords')}}">Reject</a>
                        <a class="dropdown-item" href="{{route('approvedRecords')}}">Approved</a>
                        <a class="dropdown-item" href="{{route('allRecords')}}">All Records</a>
                    </div>
                </li>
                </li>
                <!-- Add more navigation items as needed -->
            </ul>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span> {{ucfirst(Auth::user()->role)}} </span>
                    <img src="{{ asset('images/avatar.png') }}" alt="Profile Photo" class="img-fluid rounded-circle ml-2" style="width: 30px; height: 30px;">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <!-- <a class="dropdown-item" href="#">Profile</a> -->
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>