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

    <p>We regret to inform you that your enrollment submission has been rejected.</p>

    <p>If you have any questions or concerns regarding this decision, please feel free to contact us.</p>

    <p>Thank you for considering us for your child's education.</p>

    <p>Sincerely,<br>
        EnrollEase</p>
</body>

</html>