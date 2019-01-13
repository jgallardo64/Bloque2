<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link href="css/ico.ico" rel="shortcut icon" type="image/x-icon" />
        <meta charset="UTF-8">
        <title>Perfil de usuario</title>
    </head>

    <?php
require_once 'header.php';

require_once 'aside.php';
?>

    <body>

        <div id="entradas">

        <?php

try {
    $dwes = "mysql:host=localhost;dbname=blogdwes";
    $conexion = new PDO($dwes, 'userblog', 'passblog');
} catch (PDOException $e) {
    echo $e->getMessage();
}
echo '<h2>Perfil de usuario</h2>';
echo '<table id="moderacion">';

$resultado = $conexion->query('SELECT idUsuario, nombreUsuario, DAY(fechaRegistro), MONTH(fechaRegistro), YEAR(fechaRegistro), avatarGrande, nombre, apellidos FROM usuarios WHERE idUsuario=' . $_GET['id']);
while ($registro = $resultado->fetch()) {
    echo '<tr>';
    echo '<td>';
    echo 'Nombre de usuario';
    echo '</td>';
    echo '<td>';
    echo $registro['nombreUsuario'];
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo 'Nombre';
    echo '</td>';
    echo '<td>';
    echo $registro['nombre'] . ' ' . $registro['apellidos'];
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo 'Fecha de registro';
    echo '</td>';
    echo '<td>';
    echo $registro['DAY(fechaRegistro)'] . '-' . $registro['MONTH(fechaRegistro)'] . '-' . $registro['YEAR(fechaRegistro)'];
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo 'Avatar';
    echo '</td>';
    echo '<td>';
    echo '<img src="' . $registro['avatarGrande'] . '">';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';

?>

        </div>

    </body>
</html>