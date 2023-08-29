<!DOCTYPE html>
<html>

<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <p>Click the link below to proceed with enrollment:</p>
    <a href="{{ $enrollmentLink }}">{{ $enrollmentLink }}</a>

    <p>A member of our team will review your submission and get back to you with further instructions shortly.</p>

    <p>If you have any questions or need assistance, please feel free to contact us.</p>

    <p>Thank you for choosing us!</p>

    <p>Sincerely,<br>
        EnrollEase</p>
</body>

</html>