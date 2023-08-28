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
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        $(document).on('click', '.delete-btn', function() {
            var enrollmentId = $(this).data('id');
            swal({
                title: "Reject?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, reject it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    // Use the correct variable name (enrollmentId) in the URL
                    $.ajax({
                        type: 'PUT',
                        url: "{{ route('rejectRecords') }}/" + enrollmentId,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            console.log(response.error)
                            if (response.success) {
                                var enrollmentTable = $('#enrollmentTable').DataTable();
                                enrollmentTable.ajax.reload();
                                swal("Done!", response.message, "success");

                            } else {
                                swal("Error!", response.message, "error");
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error(xhr.responseText);
                            swal("Error!", "An error occurred while processing the request.", "error");
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
 -->





@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush