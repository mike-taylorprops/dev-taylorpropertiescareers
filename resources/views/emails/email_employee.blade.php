<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Message from TaylorPropertiesCareers.com</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f5f7fb; padding:24px;">
    <table style="max-width:560px; margin:0 auto; background:#fff; border-radius:12px; overflow:hidden; border:1px solid #e2e8f0;">
        <tr>
            <td style="background:#225a96; padding:20px 24px;">
                <h1 style="color:#fff; font-size:20px; margin:0;">Taylor Properties Careers</h1>
                <p style="color:#cbd5e1; font-size:13px; margin:4px 0 0;">A visitor sent a message from the website</p>
            </td>
        </tr>
        <tr>
            <td style="padding:24px;">
                <p style="margin:0 0 8px; color:#0f172a;"><strong>To:</strong> {{ $details['to_name'] ?? '' }}</p>
                <p style="margin:0 0 8px; color:#0f172a;"><strong>From:</strong> {{ $details['name'] ?? '' }}</p>
                <p style="margin:0 0 8px; color:#0f172a;"><strong>Email:</strong> {{ $details['email'] ?? '' }}</p>
                <p style="margin:0 0 16px; color:#0f172a;"><strong>Phone:</strong> {{ $details['phone'] ?? 'n/a' }}</p>
                <hr style="border:none; border-top:1px solid #e2e8f0; margin:16px 0;">
                <p style="margin:0 0 8px; color:#0f172a;"><strong>Message:</strong></p>
                <p style="margin:0; color:#334155; line-height:1.6; white-space:pre-line;">{{ $details['message'] ?? '' }}</p>
            </td>
        </tr>
    </table>
</body>
</html>
