<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EnrollEase</title>
</head>

<body>

    <!-- Navigation Bar -->
    @include('includes.navigation')
    <!-- Navigation Bar Ends -->

    <!-- Hero Section -->
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="display-4">Welcome to EnrollEase</h1>
            <p class="lead">Streamline the enrollment process for parents and administrators.</p>
            <a class="btn btn-primary btn-lg" id="emailButton" role="button">Get Started</a>

        </div>
    </section>


    <!-- Features Section -->
    @include('includes.features')
    <!-- Features Section Ends -->

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 fixed-bottom">
        <p>&copy; 2023 EnrollEase. All rights reserved.</p>
    </footer>
    @include('sweetalert::alert')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const emailButton = document.getElementById('emailButton');

            emailButton.addEventListener('click', async () => {
                const {
                    value: email
                } = await Swal.fire({
                    title: 'Input email address',
                    input: 'email',
                    inputLabel: 'Your email address',
                    inputPlaceholder: 'Enter your email address',
                    showCancelButton: true,
                    confirmButtonText: 'Send Email'
                });

                if (email) {
                    Swal.fire({
                        title: 'Sending Email',
                        text: 'Please wait...',
                        showCancelButton: false,
                        showConfirmButton: false,
                        showLoaderOnConfirm: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false
                    });

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'PUT',
                        url: "{{ route('procedureUrl') }}",
                        dataType: 'JSON',
                        data: {
                            _token: CSRF_TOKEN,
                            email: email
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Enrollment Procedure Sent',
                                    text: `The procedure for enrollment has been sent to ${email}`,
                                    icon: 'success'
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message,
                                    icon: 'error'
                                });
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                title: 'Error',
                                text: 'An error occurred while processing the request.',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });
    </script>



    <script src="{{ mix('js/app.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>