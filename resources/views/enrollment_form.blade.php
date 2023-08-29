@extends('layouts.app')
@section('title', 'Enrollment Form')

@section('content')
<div class="container mt-5">
    <h1>EnrollEase - Enrollment Form</h1>
    <form method="POST" action="{{route('enrollment.store')}}">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="childFirstName" class="form-label">Child's First Name</label>
                <input type="text" class="form-control" id="childFirstName" name="ch_FirstName" required>
            </div>
            <div class="col">
                <label for="ch_MiddleName" class="form-label">Child's Middle Name</label>
                <input type="text" class="form-control" id="ch_MiddleName" name="ch_MiddleName">
            </div>
            <div class="col">
                <label for="ch_LastName" class="form-label">Child's Last Name</label>
                <input type="text" class="form-control" id="ch_LastName" name="ch_LastName" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Child's Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday" required>
        </div>
        <div class="mb-3">
            <label for="lrn_or_student_id" class="form-label">Child's LRN/Student ID</label>
            <input type="text" class="form-control" id="lrn_or_student_id" name="lrn_or_student_id" required>
        </div>
        <hr>
        <div class="row mb-3">
            <div class="col">
                <label for="pr_FirstName" class="form-label">Parent's First Name</label>
                <input type="text" class="form-control" id="pr_FirstName" name="pr_FirstName" required>
            </div>
            <div class="col">
                <label for="pr_MiddleName" class="form-label">Parent's Middle Name</label>
                <input type="text" class="form-control" id="pr_MiddleName" name="pr_MiddleName">
            </div>
            <div class="col">
                <label for="pr_LastName" class="form-label">Parent's Last Name</label>
                <input type="text" class="form-control" id="pr_LastName" name="pr_LastName" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="parent_contact_number" class="form-label">Parent's Contact Number</label>
            <input type="tel" class="form-control" id="parent_contact_number" name="parent_contact_number" required>
            <div class="form-text">Please enter numbers only.</div>
        </div>

        <div class="mb-3">
            <label for="parent_email" class="form-label">Parent's Email Address</label>
            <input type="email" class="form-control" id="parent_email" name="parent_email" required>
        </div>
        <div class="mb-3">
            <label for="parent_relationship" class="form-label">Parent-Child Relationship</label>
            <input type="text" class="form-control" id="parent_relationship" name="parent_relationship" required>
        </div>
        <a href="{{ Auth::check() ? route('dashboard') : route('home') }}" class="btn btn-secondary btn-block">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    document.getElementById("parent_contact_number").addEventListener("input", function() {
        this.value = this.value.replace(/[^0-9]/g, ""); // Remove non-numeric characters
    });
</script>
@endsection