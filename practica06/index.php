<!--TODO:
Objetivos:
- Desarrollo de una aplicación web para la administración de documentos PDF, usando PHP, HTML, CSS, JS, Bootstrap y AJAX.

Especificaciones:
^ La página principal debe mostrar los archivos que actualmente están subidos al directorio.
^ La aplicación debe contar con la funcionalidad de subir archivos PDF.
^ Debe de tener la funcionalidad de visualizar los archivos PDF (y al visualizar no debe tener 
en la URL el mapping del directorio donde se encuentra el archivo, 
para esto el archivo se debe desplegar en la propia URL de la página PHP ver.php).
- La funcionalidad de borrar un archivo del listado, 
en el cual una vez borrado el archivo, 
se debe actualizar el listado de los archivo 
actuales de forma dinámica (usando AJAX).

Entregables:
- Todo el source code de la aplicación (ya sea en .zip o un link al repositorio github).
- Un link al sitio funcional donde se encuentra alojada la aplicación.
-->
<?php

$miNombre = 'Luis Gerardo Perales';
$navegador = $_SERVER['HTTP_USER_AGENT'];

$busqueda = $_GET['busqueda'];

$arr1 = array();

include 'config.php';

$archivos = scandir(DIRECTORIO_ARCHIVOS);

foreach ($archivos as $a) {
    $ext = pathinfo($a, PATHINFO_EXTENSION);
    if (strtolower($ext) === 'pdf')
    $arr1[] = $a;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <title>Práctica 06</title>
    
    <script src="js/listar_archivos.js"></script>
</head>
<body>

    <div class="jumbotron text-center">
        <h1>Práctica 06</h1>
        <h3>Programación del Lado del Servidor con PHP</h3>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <h3>Fecha Hora del Servidor</h3>
                <p><?php echo date(DATE_ATOM); ?></p>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <p>Nombre: <strong><?=$miNombre?></strong></p>
                <p>User Agent: <strong><?php echo $navegador; ?></strong></p>
                <p>Busqueda: <strong><?=$busqueda?></strong></p>
                <p><?php echo var_dump($miNombre); ?></p>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <ul>
                    <?php foreach ($arr1 as $i) { ?>
                        <li><?=$i?></li>
                    <?php } ?>
                </ul>
                <a href="../practica06/subir_archivo.html">Subir archivos</a><br />

            </div>
        </div>
        <?php
        include '../practica06/listar_archivos.php';
        include '../practica06/file_storage.html';
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>