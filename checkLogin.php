<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <?php

try {
    $dwes = "mysql:host=localhost;dbname=blogdwes";
    $conexion = new PDO($dwes, 'userblog', 'passblog');
    $sql = "SELECT idUsuario, avatar, admin FROM usuarios WHERE nombreUsuario= :username AND pass= :password";
    $resultado = $conexion->prepare($sql);

    $username = htmlentities(addslashes($_POST['username']));
    $password = htmlentities(addslashes($_POST['passwd']));
    $password = md5($password);
    echo $password;

    $resultado->bindValue(':username', $username);
    $resultado->bindValue(':password', $password);
    $resultado->execute();

    $registro = $resultado->rowCount();
    $usuario = $resultado->fetch();
    $id = $usuario['idUsuario'];
    $avatar = $usuario['avatar'];
    if ($usuario['admin'] == 1) {
        $admin = $usuario['admin'];
    }

    if ($registro != 0) {
        session_start();
        $_SESSION['usuario'] = $_POST['username'];
        $_SESSION['id'] = $id;
        $_SESSION['admin'] = $admin;
        $_SESSION['avatar'] = $avatar;

        header("location:index.php");

    } else {
        echo "ERROR";
        //header("location:login.php");

    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

</body>
</html>