<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link href="css/ico.ico" rel="shortcut icon" type="image/x-icon" />
        <meta charset="UTF-8">
        <title>Moderar entradas</title>
    </head>
    <body>

        <?php
require_once 'header.php';
?>

    <div id="entradas" align="center">

        <?php

if (isset($_SESSION['admin'])) {

    try {
        $dwes = "mysql:host=localhost;dbname=blogdwes";
        $conexion = new PDO($dwes, 'userblog', 'passblog');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    echo '<h2>Lista de entradas del blog</h2>';
    echo '<table id="moderacion">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Titulo</th>';
    echo '<th>Autor</th>';
    echo '<th>Fecha</th>';
    echo '<th>Acción</th>';
    echo '</tr>';

    $resultado = $conexion->query('SELECT E.idEntrada, E.titulo, U.nombre, U.apellidos, E.fechaPublicacion FROM entradas E, usuarios U WHERE E.autor=U.idUsuario ORDER BY E.idEntrada DESC');
    while ($registro = $resultado->fetch()) {
        echo '<tr>';
        echo '<td>';
        echo $registro['idEntrada'];
        echo '</td>';
        echo '<td>';
        echo '<a href="noticias.php?id=' . $registro['idEntrada'] . '" class="noticias" target="_blank">' . $registro['titulo'] . '</a>';
        echo '</td>';
        echo '<td>';
        echo $registro['nombre'] . ' ' . $registro['apellidos'];
        echo '</td>';
        echo '<td>';
        echo $registro['fechaPublicacion'];
        echo '</td>';
        echo '<td>';
        echo '<a href="editarEntrada.php?id=' . $registro['idEntrada'] . '"><img src="css/edit.png" width=20></a>';
        echo ' ';
        echo "<a onClick=\"javascript: return confirm('¿Desea borrar esta entrada?');\" href='borrarEntrada.php?id=" . $registro['idEntrada'] . "'><img src=\"css/delete.png\" width=20></a>";
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';

} else {
    header('Location: error.php');
}
?>

</div>
    </body>
</html>