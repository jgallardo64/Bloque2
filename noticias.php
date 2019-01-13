<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link href="css/ico.ico" rel="shortcut icon" type="image/x-icon" />
        <meta charset="UTF-8">
        <title>Noticia</title>
    </head>
    <body>
        <?php
require_once 'header.php';
?>

<div id="entradas">

<?php
try {
    $dwes = "mysql:host=localhost;dbname=blogdwes";
    $conexion = new PDO($dwes, 'userblog', 'passblog');
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<?php
if ($_POST) {

    // Prepare
    $stmt = $conexion->prepare("INSERT INTO comentarios (entrada, cuerpo, autor, fechaComentario) VALUES (?, ?, ?, ?)");
    $fecha = date('Y-m-d H:i:s');
    // Bind
    $stmt->bindParam(1, $_GET['id']);
    $stmt->bindParam(2, $_POST['cuerpo']);
    $stmt->bindParam(3, $_SESSION['id']);
    $stmt->bindParam(4, $fecha);
    // Excecute
    $stmt->execute();

    header("Refresh:0");
}
?>

    <?php

$resultado = $conexion->query('SELECT E.idEntrada, DAY(E.fechaPublicacion), MONTH(E.fechaPublicacion), YEAR(E.fechaPublicacion), HOUR(E.fechaPublicacion), MINUTE(E.fechaPublicacion), U.nombreUsuario, E.etiquetas, E.titulo, E.cuerpo FROM entradas E, usuarios U WHERE E.autor=U.idUsuario AND E.idEntrada=' . $_GET['id']);
while ($registro = $resultado->fetch()) {
    echo '<p class="encabezado">';
    echo 'Entrada #' . $registro['idEntrada'] . ' Fecha: ' . $registro['DAY(E.fechaPublicacion)'] . '-' . $registro['MONTH(E.fechaPublicacion)'] . '-' . $registro['YEAR(E.fechaPublicacion)'] . ' ' . $registro['HOUR(E.fechaPublicacion)'] . ':' . $registro['MINUTE(E.fechaPublicacion)'];
    echo '<br>';
    echo 'Autor: ' . $registro['nombreUsuario'];
    echo '<br>';
    echo 'Etiquetas: ' . $registro['etiquetas'];
    echo '</p>';
    echo '<p class="titulos">' . $registro['titulo'] . '</p>';
    echo '<p class="cuerpo">';
    echo $registro['cuerpo'];
    echo '</p>';
    echo '<hr>';
    echo '<h3>Comentarios</h3>';
    $comentarios = $conexion->query('SELECT C.idComentario, U.nombre, U.apellidos, C.cuerpo, DAY(C.fechaComentario), MONTH(C.fechaComentario), YEAR(C.fechaComentario), HOUR(C.fechaComentario), MINUTE(C.fechaComentario) FROM comentarios C, usuarios U WHERE C.autor=U.idUsuario AND C.entrada=' . $registro['idEntrada']);
    while ($comentario = $comentarios->fetch()) {
        echo $comentario['nombre'] . ' ' . $comentario['apellidos'] . ' el ' . $comentario['DAY(C.fechaComentario)'] . '-' . $comentario['MONTH(C.fechaComentario)'] . '-' . $comentario['YEAR(C.fechaComentario)'] . ' a las ' . $comentario['HOUR(C.fechaComentario)'] . ':' . $comentario['MINUTE(C.fechaComentario)'];
        if (isset($_SESSION['admin'])) {
            echo "<a onClick=\"javascript: return confirm('¿Desea borrar este comentario?');\" href='borrarComentario.php?noticia=" . $_GET['id'] . "&id=" . $comentario['idComentario'] . "'><img src=\"css/delete.png\" width=20></a>";
        }
        echo '<p class="comentarios">';
        echo $comentario['cuerpo'];
        echo '</p>';
    }
    echo '<hr>';
}

?>

    <form name="input" action="#" method="post">
        Insertar nuevo comentario: <textarea placeholder="Escribe aqui..." rows="15" cols="60" id="entrada" name="cuerpo"></textarea>
        <input type="submit"><br><br>
    </form>
</div>

</div>
    </body>
</html>