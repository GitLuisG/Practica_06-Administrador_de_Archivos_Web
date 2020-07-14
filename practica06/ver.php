<?php

include 'config.php';

$archivo = filter_input(INPUT_GET, 'a');
if ($archivo === NULL || $archivo === false || $archivo === '') {
    echo '[ERROR: Archivo no especificado]';
    exit();
}

$ruta = DIRECTORIO_ARCHIVOS . $archivo;
$ext = pathinfo($archivo, PATHINFO_EXTENSION);
if (strtolower($ext) != 'pdf') {
    echo '[Solo se pueden mostrar los archivos PDF]';
    exit();
}

if (!file_exists($ruta)) {
    echo '[No existe el archivo]';
    exit();
}

header('Content-Type: application/pdf');  // MIME Type para archivos PDF.
header('Content-Disposition: inline; filename="' . $archivo . '"');
header('Content-Length: ' . filesize($ruta));

readfile($ruta);
