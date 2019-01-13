<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link href="css/ico.ico" rel="shortcut icon" type="image/x-icon" />
        <meta charset="UTF-8">
        <title>Crear nueva entrada</title>
    </head>
    <body>

        <?php
require_once 'header.php';
?>

        <?php

if (isset($_SESSION['id'])) {

    if ($_POST) {
        echo '<div id="entradas" align="center"><h1>Noticia creada correctamente</h1>';
        try {
            $dwes = "mysql:host=localhost;dbname=blogdwes";
            $conexion = new PDO($dwes, 'userblog', 'passblog');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        // Prepare
        $stmt = $conexion->prepare("INSERT INTO entradas (fechaPublicacion, autor, etiquetas, titulo, cuerpo) VALUES (?, ?, ?, ?, ?)");
        $usuario = $_SESSION['id'];
        $fecha = date('Y-m-d H:i:s');
        $texto = nl2br(htmlentities($_POST['cuerpo'], ENT_QUOTES, 'UTF-8'));
        // Bind
        $stmt->bindParam(1, $fecha);
        $stmt->bindParam(2, $usuario);
        $stmt->bindParam(3, $_POST['etiquetas']);
        $stmt->bindParam(4, $_POST['titulo']);
        $stmt->bindParam(5, $texto);
        // Excecute
        $stmt->execute();
    }

    if (!$_POST) {
        echo '
        <div id="entradas" align="center">
            <form name="input" action="#" method="post">
                Autor: ' . $_SESSION['usuario'] . '<br><br>
                Titulo: <input type="text" name="titulo" id="entrada"><br>
                Texto: <textarea placeholder="Escribe aqui..." rows="30" cols="80" id="entrada" name="cuerpo"></textarea>
                Etiquetas: <input type="text" name="etiquetas" id="entrada"><br>
                <input type="submit"><br><br>
            </form>
        </div>';
    }
} else {
    echo '<div id="entradas" align="center"><h1>Esta pagina es solo accesible si estas logeado en la web</h1></div>';
}
?>
   </body>
</html>