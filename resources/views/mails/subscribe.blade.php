<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agradecimiento por suscribirte</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f7f7f7; margin: 0; padding: 0;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f7f7f7;">
        <tr>
            <td style="padding: 20px;">
                <table align="center" width="600" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <tr>
                    <td style="padding: 20px; text-align: center;">
                        <h1 style="color: #333333;">Thank you for subscribing {{$user->name}}</h1>
                        <p style="color: #666666;">We welcome you to our news section that will be sent to your email: {{$user->email}}!</p>
                    </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
