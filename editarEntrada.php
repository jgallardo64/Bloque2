<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link href="css/ico.ico" rel="shortcut icon" type="image/x-icon" />
        <meta charset="UTF-8">
        <title>Editar entrada</title>
    </head>
    <body>

        <?php
require_once 'header.php';
?>

        <?php

if (isset($_SESSION['id'])) {

    try {
        $dwes = "mysql:host=localhost;dbname=blogdwes";
        $conexion = new PDO($dwes, 'userblog', 'passblog');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if ($_POST) {
        echo '<div id="entradas" align="center"><h1>Noticia editada correctamente</h1>';
        // Prepare
        $stmt = $conexion->prepare('UPDATE entradas SET titulo = ?, cuerpo = ?, etiquetas = ? WHERE idEntrada=' . $_GET['id']);
        $texto = nl2br(htmlentities($_POST['cuerpo'], ENT_QUOTES, 'UTF-8'));
        // Bind
        $stmt->bindParam(1, $_POST['titulo']);
        $stmt->bindParam(2, $texto);
        $stmt->bindParam(3, $_POST['etiquetas']);
        // Excecute
        $stmt->execute();
    }

    if (!$_POST) {

        $resultado = $conexion->query('SELECT E.idEntrada, E.titulo, E.cuerpo, U.nombreUsuario, E.fechaPublicacion, E.etiquetas FROM entradas E, usuarios U WHERE E.autor=U.idUsuario AND E.idEntrada=' . $_GET['id']);

        while ($registro = $resultado->fetch()) {
            $cuerpo = strip_tags($registro['cuerpo']);
            echo '<div id="entradas" align="center">
                <form name="input" action="#" method="post">
                Autor: ' . $registro['nombreUsuario'] . '<br>
                Fecha: ' . $registro['fechaPublicacion'] . '<br>
                Titulo: <input type="text" name="titulo" id="entrada" value="' . $registro['titulo'] . '"><br>
                Texto: <textarea placeholder="Escribe aqui..." rows="30" cols="80" id="entrada" name="cuerpo">' . $cuerpo . '</textarea>
                Etiquetas: <input type="text" name="etiquetas" id="entrada" value="' . $registro['etiquetas'] . '"><br>
                <input type="submit"><br><br>
            </form>
        </div>';

        }

    }
} else {
    echo '<div id="entradas" align="center"><h1>Esta pagina es solo accesible si estas logeado en la web</h1></div>';
}
?>
    </body>
</html>
