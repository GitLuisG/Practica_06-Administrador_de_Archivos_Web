<?php

include 'config.php';

$archivos = scandir(DIRECTORIO_ARCHIVOS);
$archivosPdf = array();

foreach ($archivos as $a) {
    $ext = pathinfo($a, PATHINFO_EXTENSION);
    if (strtolower($ext) === 'pdf')
        $archivosPdf[] = $a;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <title>Paráctica 06</title>
    <script src="js/listar_archivos.js"></script>
</head>
<body>
    <div id="contenedor">
        <h3>Práctica 06: Archivos</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th><th>Ver</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($archivosPdf as $a) { ?>
                <tr>
                    <td><span><?=$a?></span></td>
                    <td><a href="ver.php?a=<?=$a?>" target="_blank">VER</a></td>
                </tr>
<?php } ?>
            </tbody>
        </table>
        <hr />
        <div id="tablaArchivos">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</body>
</html>
