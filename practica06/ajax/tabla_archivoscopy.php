<?php

include '../config.php';

$archivos = scandir(DIRECTORIO_ARCHIVOS2);
$archivosPdf = array();

foreach ($archivos as $a) {
    $ext = pathinfo($a, PATHINFO_EXTENSION);
    if (strtolower($ext) === 'pdf')
        $archivosPdf[] = $a;
}

sleep(2);

?>

<table>
    <thead>
        <tr>
            <th>Nombre</th><th>Ver</th><th>Borrar</th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($archivosPdf as $a) { ?>
        <tr>
            <td><span><?=$a?></span></td>
            <td><a href="ver.php?a=<?=$a?>" target="_blank">VER</a></td>
            <td><input type="button" value="BORRAR" class="accionBorrar" data-archivo="<?=$a?>" /></td>
        </tr>
<?php } ?>
    </tbody>
</table>
