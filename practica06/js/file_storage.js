
const $inputArchivo = $('#inputArchivo');
const $btnSubirArchivo = $('#btnSubirArchivo');
const $divTablaArchivos = $('#divTablaArchivos');

function btnSubirArchivo_click(e) {

    if (!$inputArchivo[0].files.length) {
        $inputArchivo.focus();
        return;
    }

    // TODO: Validación de que el archivo sea PDF (extensión .pdf).

    $btnSubirArchivo.prop('disabled', true);

    let params = new FormData();
    params.append('archivo', $inputArchivo[0].files[0]);

    $.ajax({
        url: 'ajax/guardar_archivo.php',
        data: params,
        type: 'POST',
        dataType:'pdf',
        contentType: false,
        processData: false,
        success: function(d) {
            $inputArchivo.val('');
            $btnSubirArchivo.prop('disabled', false);
            if (d.guardado) {
                loadTablaArchivos();
            }
            else {
                alert(d.error);
            }
        },
        error: function(jqXHR, textStatus, err) {
            $btnSubirArchivo.prop('disabled', false);
            alert('Algo salió mal :(');
            console.error(err);
        }
    });

}

function btnBorrar_click(e) {

    $btnBorrar = $(this);
    let archivo = $btnBorrar.data('archivo');

    let confirmMsg = `Está seguro que desea borrar el archivo ${archivo}?`;
    if (!confirm(confirmMsg)) return;
    // TODO: Hacer la llamada AJAX para borrar el archivo seleccionado.
    
}

function loadTablaArchivos(archivo) {
    let loadCompleted = function() {
        $('.accionBorrar').on('click', btnBorrar_click);
    };
    $divTablaArchivos
        .html('')
        .text('Cargando Archivos...')
        .load('../practica06/ajax/tabla_archivoscopy.php', loadCompleted);
}

$btnSubirArchivo.on('click', btnSubirArchivo_click);

loadTablaArchivos();
