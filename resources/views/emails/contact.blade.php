<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>New Message from HireMate LK Contact Form</h2>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
    <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">
    <p><strong>Message:</strong></p>
    <p style="white-space: pre-wrap;">{{ $data['message'] }}</p>
</body>
</html>
