@extends('layouts.app')
@section('title','Archive')
@section('content')
<div class="card">
    <div class="card-header">Manage Users</div>
    <div class="card-body">
        <div class="table-responsive">
            {{ $dataTable->table(['id' => 'enrollmentTable']) }}
        </div>
    </div>
</div>

@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush