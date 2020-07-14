<?php

include 'config.php';

if (!isset($_FILES['archivo'])) {
    header('Location: subir_archivo.html');
    exit();
}

$nombreArchivo = basename($_FILES['archivo']['name']);
$rutaFinal = DIRECTORIO_ARCHIVOS . $nombreArchivo;
if (basename($_FILES['archivo']['type']) == 'pdf'){
    move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaFinal);
}else{
    header('Location: index.php');
    exit();
}

// var_dump($_FILES['archivo']);

header('Location: subir_archivo.html');

?>
