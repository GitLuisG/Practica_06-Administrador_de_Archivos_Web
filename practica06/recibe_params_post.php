<?php

$x = filter_input(INPUT_POST, 'x');
$y = filter_input(INPUT_POST, 'y');

if ($x === NULL || $x === false || $y === NULL || $y === false) {
    header('Location: enviar_params_post.html');
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
        <p><a href="enviar_params_post.html">Regresar</a></p>
        <p>Parámetro Recibido "x" = <strong><?=$x?></strong></p>
        <p>Parámetro Recibido "y" = <strong><?=$y?></strong></p>
    </div>
</body>
</html>
