<!doctype html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link href="css/ico.ico" rel="shortcut icon" type="image/x-icon" />
        <meta charset="UTF-8">
        <title>Formulario de registro</title>
    </head>

    <body style="background-image: url(css/background.jpg)">

        <?php
require_once 'header.php';
?>
        <div id="registro" align="center">
            <?php

try {
    $dwes = "mysql:host=localhost;dbname=blogdwes";
    $conexion = new PDO($dwes, 'userblog', 'passblog');
} catch (PDOException $e) {
    echo $e->getMessage();
}

$errorNombre = $errorUsuario = $errorPassword = $nombre = $usuario = $password = '';

if ($_POST) {
    $errores = 0;

    if (empty($_POST['username'])) {
        $errorUsername = " El nombre de usuario es obligatorio";
        $errores++;
    } else {
        $username = $_POST['username'];
    }

    if (empty($_POST['password']) || empty($_POST['password2'])) {
        $errorPassword = " La contraseña es obligatoria";
        $errores++;
    } else if ($_POST['password'] != $_POST['password2']) {
        $errorPassword = " Las contraseñas no coinciden";
        $errores++;
    }
}

if (!$_POST || $errores > 0) {
    echo
        "<form name=\"input\" name=\"login\" action=\"registroCorrecto.php\" method=\"post\" enctype=\"multipart/form-data\">
            <span class=\"error\">* Campos requeridos</span><br><br>
            Nombre: <input type=\"text\" name=\"nombre\" id=\"login\" value=\"$nombre\">
            <span class=\"error\">*" . $errorNombre . "</span><br><br>
            Apellidos: <input type=\"text\" name=\"apellidos\" id=\"login\">
            <span class=\"error\">*" . $errorNombre . "</span><br><br>
            Nombre de usuario: <input type=\"text\" name=\"username\" id=\"login\" value=\"$usuario\">
            <span class=\"error\">*" . $errorUsuario . "</span><br><br>
            Contraseña: <input type=\"password\" name=\"password\" id=\"login\"><span class=\"error\">*</span><br><br>
            Repetir contraseña: <input type=\"password\" name=\"password2\" id=\"login\">
            <span class=\"error\">*<br>" . $errorPassword . "</span><br>
            Sube una imagen de perfil <br>
            <input type=\"file\" name=\"imagen\" id=\"imagen\"><br>
            (png/jpg. Máximo 360x480px)<br><br>
            <input type=\"submit\" value=\"Registrarse\"><br><br>
            </form></div>";
}
?>
        </div>
    </body>

</html>
