<?php

$x = filter_input(INPUT_GET, 'x');

if ($x === NULL || $x === false) {
    header('Location: enviar_params_get.html');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/style.css" rel="stylesheet" text="text/css" />
    <title>Práctica 06</title>
</head>
<body>
    <div id="contenedor">
        <h3>Práctica 06</h3>
        <p><a href="enviar_params_get.html">Regresar</a></p>
        <p>Parámetro Recibido "x" = <strong><?=$x?></strong></p>
    </div>
</body>
</html>
