@extends('layouts.app')
@section('content')
<div class="container">
    <div class="login-container">
        <h2 class="text-center">EnrollEase</h2>
        <form action="{{route('login.post')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <a href="{{ route('home') }}" class="btn btn-secondary btn-block">Back</a>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="{{route('home')}}">Sign Up</a></p>
    </div>
</div>
@endsection