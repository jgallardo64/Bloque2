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
        "<form name=\"input\" name=\"login\" action=\"#\" method=\"post\">
            <span class=\"error\">* Campos requeridos</span><br><br>
            Nombre: <input type=\"text\" name=\"nombre\" id=\"login\" value=\"$nombre\">
            <span class=\"error\">*" . $errorNombre . "</span><br><br>
            Apellidos: <input type=\"text\" name=\"apellidos\" id=\"login\">
            <span class=\"error\">*" . $errorNombre . "</span><br><br>
            Nombre de usuario: <input type=\"text\" name=\"username\" id=\"login\" value=\"$usuario\">
            <span class=\"error\">*" . $errorUsuario . "</span><br><br>
            Contraseña: <input type=\"password\" name=\"password\" id=\"login\"><span class=\"error\">*</span><br><br>
            Repetir contraseña: <input type=\"password\" name=\"password2\" id=\"login\">
            <span class=\"error\">*<br>" . $errorPassword . "</span><br><br>
            <input type=\"submit\" value=\"Registrarse\"><br><br>
            </form></div>";
} else {
    echo "<p><h1>El registro se ha completado con éxito<h1></p>";

    try {
        $dwes = "mysql:host=localhost;dbname=blogdwes";
        $conexion = new PDO($dwes, 'userblog', 'passblog');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    // Prepare
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombreUsuario, pass, fechaRegistro, nombre, apellidos, admin) VALUES (?, ?, ?, ?, ?, ?)");
    $fecha = date('Y-m-d H:i:s');
    $passEncriptada = md5($_POST['password']);
    $admin = false;
    // Bind
    $stmt->bindParam(1, $_POST['username']);
    $stmt->bindParam(2, $passEncriptada);
    $stmt->bindParam(3, $fecha);
    $stmt->bindParam(4, $_POST['nombre']);
    $stmt->bindParam(5, $_POST['apellidos']);
    $stmt->bindParam(6, $admin);
    // Excecute
    $stmt->execute();
}
?>
        </div>
    </body>

</html>
