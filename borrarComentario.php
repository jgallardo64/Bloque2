<?php
session_start();
if (isset($_SESSION['admin'])) {

    try {
        $dwes = "mysql:host=localhost;dbname=blogdwes";
        $conexion = new PDO($dwes, 'userblog', 'passblog');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $stmt = $conexion->prepare('DELETE FROM comentarios WHERE idComentario=' . $_GET['id']);
    $stmt->execute();

    header('Location: noticias.php?id=' . $_GET['noticia']);

} else {
    header('Location: error.php');
}
