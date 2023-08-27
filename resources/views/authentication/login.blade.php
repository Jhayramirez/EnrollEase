@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Adjust the column width here -->
            <div class="login-container bg-light p-4 rounded">
                <h2 class="text-center mb-4">EnrollEase</h2>
                <form action="{{route('login.post')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
                <p class="text-center mt-3">Don't have an account? <a href="{{route('home')}}">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>

@endsection