<!DOCTYPE html>
<html>
<head>
    <title>Thank You - HireMate LK</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f9fafb; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 30px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
        
        <!-- Header -->
        <div style="background-color: #0d9488; padding: 30px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">HireMate LK</h1>
            <p style="color: #ccfbf1; margin: 8px 0 0 0; font-size: 14px;">Sri Lanka's Trusted Worker Platform</p>
        </div>

        <!-- Body -->
        <div style="padding: 30px;">
            <h2 style="color: #111827; margin-top: 0;">Hi {{ $data['name'] }},</h2>
            <p>Thank you for reaching out to us! We have received your message and our team will get back to you as soon as possible.</p>
            
            <div style="background-color: #f0fdfa; border-left: 4px solid #0d9488; padding: 16px; border-radius: 0 8px 8px 0; margin: 20px 0;">
                <p style="margin: 0 0 8px 0;"><strong>Your Message Details:</strong></p>
                <p style="margin: 4px 0;"><strong>Subject:</strong> {{ $data['subject'] }}</p>
                <p style="margin: 4px 0;"><strong>Message:</strong></p>
                <p style="margin: 4px 0; white-space: pre-wrap; color: #4b5563;">{{ $data['message'] }}</p>
            </div>

            <p>We typically respond within 24 hours during business days.</p>
            <p style="margin-bottom: 0;">Best regards,<br><strong>The HireMate LK Team</strong></p>
        </div>

        <!-- Footer -->
        <div style="background-color: #f3f4f6; padding: 20px; text-align: center; font-size: 12px; color: #6b7280;">
            <p style="margin: 0;">&copy; {{ date('Y') }} HireMate LK. All rights reserved.</p>
            <p style="margin: 4px 0 0 0;">This is an automated confirmation email. Please do not reply directly to this email.</p>
        </div>
    </div>
</body>
</html>
