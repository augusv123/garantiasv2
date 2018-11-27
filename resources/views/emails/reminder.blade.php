<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h3>Reseteo de Clave</h3>
    <div>
       Usted ha solicitado un reseteo de contraseña. Complete el siguiente formulario: {{ URL::to('password/reset', array($token)) }}
    </div>
</body>
</html>