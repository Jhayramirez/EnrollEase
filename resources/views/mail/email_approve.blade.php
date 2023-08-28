<!DOCTYPE html>
<html>

<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <ul>
        <li><strong>Name of Child:</strong> {{ $mailData['childName'] }}</li>
        <li><strong>Birthday:</strong> {{ $mailData['childBirthday'] }}</li>
        <li><strong>LRN or Student ID:</strong> {{ $mailData['lrnOrStudentId'] }}</li>
    </ul>

    <p><strong>Parent's Information:</strong></p>
    <ul>
        <li><strong>Parent Name:</strong> {{ $mailData['parentName'] }}</li>
        <li><strong>Parent Contact Number:</strong> {{ $mailData['parentContactNumber'] }}</li>
        <li><strong>Parent Email Address:</strong> {{ $mailData['parentEmail'] }}</li>
        <li><strong>Parent Relationship:</strong> {{ $mailData['parentRelationship'] }}</li>
    </ul>

    <p>Your enrollment submission has been approved. You are now officially enrolled in our program.</p>

    <p>A member of our team will be in touch with you to provide further instructions and details about the program.</p>

    <p>If you have any questions or need assistance, please feel free to contact us.</p>

    <p>Thank you for choosing us!</p>

    <p>Sincerely,<br>
        EnrollEase</p>
</body>

</html>