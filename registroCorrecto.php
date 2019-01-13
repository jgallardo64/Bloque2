<!doctype html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link href="css/ico.ico" rel="shortcut icon" type="image/x-icon" />
        <meta charset="UTF-8">
        <title>Formulario de registro</title>
    </head>

    <body style="background-image: url(css/background.jpg)">

        <?php
require_once 'header.php';
?>
        <div id="registro" align="center">
            <?php

echo "<p><h1>El registro se ha completado con éxito<h1></p>";

$source_properties = getimagesize($_FILES['imagen']['tmp_name']);
$ancho = $source_properties[0];
$alto = $source_properties[1];
$formato = $source_properties[2];

if ($ancho > 480 || $alto > 480) {
    print "Error: La imagen es mayor de 360x480";
    exit();
}

if ($_FILES['imagen']['error'] != UPLOAD_ERR_OK) { // Se comprueba si hay un error al subir el archivo
    echo 'Error: ';
    switch ($_FILES['imagen']['error']) {
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:echo 'El fichero es demasiado grande';
            break;
        case UPLOAD_ERR_PARTIAL:echo 'El fichero no se ha podido subir entero';
            break;
        case UPLOAD_ERR_NO_FILE:echo 'No se ha podido subir el fichero';
            break;
        default:echo 'Error indeterminado.';
    }
    exit();
}

$formatos = array('image/jpeg', 'image/png');

if (!in_array($_FILES['imagen']['type'], $formatos)) {
    echo 'Error: Formato incorrecto';
    exit();
}

function fn_resize($image_resource_id, $width, $height, $target_width, $target_height)
{
    $target_layer = imagecreatetruecolor($target_width, $target_height);
    imagealphablending($target_layer, false);
    imagesavealpha($target_layer, true);
    imagecopyresampled($target_layer, $image_resource_id, 0, 0, 0, 0, $target_width, $target_height, $width, $height);
    return $target_layer;
}

// Si se ha podido subir el fichero se guarda
if (is_uploaded_file($_FILES['imagen']['tmp_name']) === true) { // Se comprueba que ese nombre de archivo no exista
    if (!is_dir('subidas/')) {
        mkdir('subidas/', 0700);
    }

    if ($formato == IMAGETYPE_JPEG) {
        $nombre = 'subidas/avatar_' . $_POST['username'] . '.jpg';
    } else if ($formato == IMAGETYPE_PNG) {
        $nombre = 'subidas/avatar_' . $_POST['username'] . '.png';
    }

    if (is_file($nombre) === true) {
        $idUnico = time();
        $nombre = $idUnico . '_' . $nombre;
    }

    $imagen = $_FILES['imagen']['tmp_name'];
    $ratio = $ancho / $alto;

    if ($ratio >= 1) {
        $ancho = 20 * $ratio;
        $alto = 20;
    } else {
        $alto = 20 / $ratio;
        $ancho = 20;
    }

    if ($formato == IMAGETYPE_JPEG) {
        $image_resource_id = imagecreatefromjpeg($imagen);
        $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1], $ancho, $alto);
        $imgSmall = $nombre . '_Small.jpg';
        imagejpeg($target_layer, $imgSmall);
    } else if ($formato == IMAGETYPE_PNG) {
        $image_resource_id = imagecreatefrompng($imagen);
        $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1], $ancho, $alto);
        $imgSmall = $nombre . '_Small.png';
        imagepng($target_layer, $imgSmall);
    }

// Se mueve el fichero a su nueva ubicación
    if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $nombre)) {
        echo 'Error: No se puede mover el fichero a su destino';
    }
} else {
    echo 'Error: posible ataque. Nombre: ' . $_FILES['imagen']['name'];
}

try {
    $dwes = "mysql:host=localhost;dbname=blogdwes";
    $conexion = new PDO($dwes, 'userblog', 'passblog');
} catch (PDOException $e) {
    echo $e->getMessage();
}
// Prepare
$stmt = $conexion->prepare("INSERT INTO usuarios (nombreUsuario, pass, fechaRegistro, avatar, avatarGrande, nombre, apellidos, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$fecha = date('Y-m-d H:i:s');
$passEncriptada = md5($_POST['password']);
$admin = false;
// Bind
$stmt->bindParam(1, $_POST['username']);
$stmt->bindParam(2, $passEncriptada);
$stmt->bindParam(3, $fecha);
$stmt->bindParam(4, $imgSmall);
$stmt->bindParam(5, $nombre);
$stmt->bindParam(6, $_POST['nombre']);
$stmt->bindParam(7, $_POST['apellidos']);
$stmt->bindParam(8, $admin);
// Excecute
$stmt->execute();

?>
        </div>
    </body>

</html>