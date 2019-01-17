<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>Hola {{ $name }}, usted ha enviado una peticion de eliminar su cuenta.</strong> !</h2>
    <p>Para ello simplemente debes hacer click en el siguiente enlace:</p>

    <a href="{{ url('/PanelUsuario/EliminarUser/' . $id) }}">
        Clic para eliminar tu cuenta
    </a>
</body>
</html>