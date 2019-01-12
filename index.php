
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link href="css/ico.ico" rel="shortcut icon" type="image/x-icon" />
        <meta charset="UTF-8">
        <title>Pagina principal</title>
    </head>

    <?php
require_once 'header.php';

require_once 'aside.php';
?>

    <body>

    <!--<aside id="derecha">
            <ul>
                <li><a href="" class="historial">2019</a></li>
            <ul>
                    <li><a href="listarEntradas.php?month=01&year=2019" class="historial">Enero</a></li>
                </ul>
                <li><a href="" class="historial">2018</a></li>
                <ul>
                    <li><a href="listarEntradas.php?month=12&year=2018" class="historial">Diciembre</a></li>
                    <li><a href="listarEntradas.php?month=11&year=2018" class="historial">Noviembre</a></li>
                    <li><a href="listarEntradas.php?month=10&year=2018" class="historial">Octubre</a></li>
                </ul>
            </ul>


        </aside> -->

        <div id="entradas">

            <?php
try {
    $dwes = "mysql:host=localhost;dbname=blogdwes";
    $conexion = new PDO($dwes, 'userblog', 'passblog');
} catch (PDOException $e) {
    echo $e->getMessage();
}
$resultado = $conexion->query('SELECT E.idEntrada, DAY(E.fechaPublicacion), MONTH(E.fechaPublicacion), YEAR(E.fechaPublicacion), HOUR(E.fechaPublicacion), MINUTE(E.fechaPublicacion), U.nombreUsuario, E.etiquetas, E.titulo, E.cuerpo FROM entradas E, usuarios U WHERE E.autor=U.idUsuario ORDER BY E.idEntrada DESC LIMIT 5');
while ($registro = $resultado->fetch()) {
    echo '<p class="encabezado">';
    echo 'Entrada #' . $registro['idEntrada'] . ' Fecha: ' . $registro['DAY(E.fechaPublicacion)'] . '-' . $registro['MONTH(E.fechaPublicacion)'] . '-' . $registro['YEAR(E.fechaPublicacion)'] . ' ' . $registro['HOUR(E.fechaPublicacion)'] . ':' . $registro['MINUTE(E.fechaPublicacion)'];
    echo '<br>';
    echo 'Autor: ' . $registro['nombreUsuario'];
    echo '<br>';
    echo 'Etiquetas: ' . $registro['etiquetas'];
    echo '</p>';
    echo '<p class="titulos"><a href="noticias.php?id=' . $registro['idEntrada'] . '">' . $registro['titulo'] . '</a></p>';
    echo '<p class="cuerpo">';
    echo substr($registro['cuerpo'], 0, 500) . '...';
    echo '<a href="noticias.php?id=' . $registro['idEntrada'] . '" class="leermas"> Leer mas</a>';
    echo '</p>';
    echo '<hr>';
}

?>

        </div>

    </body>
</html>