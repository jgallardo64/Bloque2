<?php
session_start();
?>

<header>
            <a href="index.php"><img src="css/logo_nba_com.png" width="200px" height="65px"></a>
            <?php

if (isset($_SESSION['usuario'])) {
    echo '<nav>
                ' . $_SESSION['usuario'] . ' <br>
                <a href="index.php">Inicio</a> |
                <a href="nuevaEntrada.php">Nueva entrada</a> | ';
    if (isset($_SESSION['admin'])) {
        echo '<a href="moderacion.php">Editar/borrar noticias</a> | ';
    }
    echo '<a href="logout.php">Salir</a>
                    </nav>';
} else {
    echo '<nav>
                <a href="index.php">Inicio</a> |
                <a href="registro.php">Registro</a> |
                <a href="login.php">Accede</a>
                </nav>';
}
?>

</header>
            <div id="barraBusqueda">
            <form name="input" action="buscarEntradas.php" method="post">
            Barra de busqueda<input type="text" name="busqueda" id="busqueda">
            <input type="radio" name="todas" id="todas">Todas las palabras <input type="radio" name="alguna" id="alguna" checked="checked">Alguna palabra <input type="submit" value="Buscar" id="btnBuscar">
            </form>
            </div>


