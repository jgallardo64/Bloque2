<?php
session_start();

if (isset($_SESSION['admin'])) {

    try {
        $dwes = "mysql:host=localhost;dbname=blogdwes";
        $conexion = new PDO($dwes, 'userblog', 'passblog');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $ok = true;
    $conexion->beginTransaction(); // Devuelve true o false, si cambia o no el modo
    $consulta1 = $conexion->prepare('DELETE FROM comentarios WHERE entrada = ?');
    $consulta1->bindParam(1, $_GET['id']);
    $consulta2 = $conexion->prepare('DELETE FROM entradas WHERE idEntrada=?');
    $consulta2->bindParam(1, $_GET['id']);

    if ($consulta1->execute() == 0) {
        $ok = false;
    }
    if ($consulta2->execute() == 0) {
        $ok = false;
    }
    if ($ok) {
        $conexion->commit(); // Si todo fue bien, confirma los cambios
        header('Location: moderacion.php');
    } else {
        $conexion->rollback(); // y si no, los revierte
        header('Location: moderacion.php');
    }
} else {
    header('Location: error.php');
}
