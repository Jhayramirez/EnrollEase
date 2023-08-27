@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="card">
    <div class="card-header">Manage Users</div>
    <div class="card-body">
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $(document).on('click', '.delete-btn', function() {
            var enrollmentId = $(this).data('id');
            if (confirm('Are you sure you want to delete this enrollment?')) {
                // AJAX delete logic
            }
        });

        $(document).on('click', '.approve-btn', function() {
            var enrollmentId = $(this).data('id');
            if (confirm('Are you sure you want to approve this enrollment?')) {
                // AJAX approve logic
            }
        });
    });
</script>






@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush