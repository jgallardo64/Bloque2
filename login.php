<!doctype html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link href="css/ico.ico" rel="shortcut icon" type="image/x-icon" />
        <meta charset="UTF-8">
        <title>Login</title>
    </head>

    <body>

        <?php
require_once 'header.php';

?>

        <?php
$errorUsername = $errorPassword = $username = $password = '';

if ($_POST) {
    $errores = 0;

    if (empty($_POST['username'])) {
        $errorUsername = " El nombre de usuario es incorrecto";
        $errores++;
    } else {
        $username = $_POST['username'];
    }

    if (empty($_POST['passwd'])) {
        $errorPassword = " La contraseña es obligatoria";
        $errores++;
    }

}
if (!$_POST) {
    echo '<div id="registro" align="center">
            <form name="input" action="checkLogin.php" method="post">
                Usuario: <input type="text" id="login" name="username" id="username"><br><br>
                Contraseña: <input type="password" id="login" name="passwd" id="password"><br><br>
                <input type="submit" value="Acceder"><br><br>
            </form>
        </div>';
}
?>
   </body>

</html>