
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link href="css/ico.ico" rel="shortcut icon" type="image/x-icon" />
        <meta charset="UTF-8">
        <title>ERROR</title>
    </head>

    <?php
require_once 'header.php';
?>

    <body>

        <div id="entradas" align="center">

        <h2>Esta pagina es solo accesible para el administrador del blog</h2>
        <h1>Serás redirigido al indice en 5 segundos</h1>
        <p>Click <a href="index.php">aquí</a> para ir ahora</p>

            <?php

header("refresh:5;url=index.php");

?>

        </div>

    </body>
</html>