<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Post Publicado</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f7f7f7; margin: 0; padding: 0;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f7f7f7;">
        <tr>
            <td style="padding: 20px;">
                <table align="center" width="600" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1); color: #333333;">
                    <tr>
                        <td style="padding: 20px;">
                            <h1 style="color: #333333;">New Post Published!</h1>
                            <p style="color: #666666;">We have published a new post in the {{$type->title}} category.</p>
                            <h2 style="color: #333333;">{{$notification->title}}</h2>
                            <p style="color: #666666;">{{$notification->description}}</p>
                            <p style="color: #007BFF;">You can't miss it!</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
