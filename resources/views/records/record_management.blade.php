@extends('layouts.app')
@section('title','Archive')
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
            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{url('/users')}}/" + id,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {

                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
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