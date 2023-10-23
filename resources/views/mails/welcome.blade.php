<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felicidades por tu registro</title>
    <!-- Carga Bootstrap desde un CDN para asegurarte de que esté disponible en los correos electrónicos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Congratulations on your registration</h1>
                <p>Hello {{$user->name }},</p>
                <p>We welcome you to our site. We are excited to have you as part of our community.</p>
                <p>We hope you enjoy all the benefits our site offers.</p>
                <p>Thank you for joining!</p>
            </div>
        </div>
    </div>

    <!-- Agrega tus estilos en línea para garantizar una mejor compatibilidad con los clientes de correo -->
    <style>
        body {
            background-color: #f7f7f7;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px;
        }
    </style>
</body>
</html>
