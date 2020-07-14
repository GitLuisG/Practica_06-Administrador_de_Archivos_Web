const $txtUsername = $('#txtUsername');
const $txtPassword = $('#txtPassword');
const $btnEnviar = $('#btnEnviar');
const $sNombre = $('#sNombre');
const $inputArchivo = $('#inputArchivo');
const $btnGuardarArchivo = $('#btnGuardarArchivo');

function btnEnviar_click(e) {

    let params = {
        'username': $txtUsername.val(), 
        'password': $txtPassword.val()
    };
    $.post('ajax/recibe_post.php', params, function(d) {
        console.log(d);
        $sNombre.text(d.autentificado ? d.nombre : '[NO AUTENTIFICADO]');
    });

    console.log('fin de llamada $.post');

}

function btnGuardarArchivo_click(e) {

    if (!$inputArchivo[0].files.length) {
        $inputArchivo.focus();
        return;
    }

    $btnGuardarArchivo.prop('disabled', true);

    let params = new FormData();
    params.append('archivo', $inputArchivo[0].files[0]);

    $.ajax({
        url: 'ajax/guardar_archivo.php',
        data: params,
        type: 'POST',
        contentType: false,
        processData: false,
        success: function(d) {
            $inputArchivo.val('');
            $btnGuardarArchivo.prop('disabled', false);
            alert(d.guardado ? 'Archivo guardado correctamente' : d.error);
        },
        error: function(jqXHR, textStatus, err) {
            $btnGuardarArchivo.prop('disabled', false);
            alert('Algo salió mal :(');
            console.error(err);
        }
    });

}

$btnEnviar.on('click', btnEnviar_click);
$btnGuardarArchivo.on('click', btnGuardarArchivo_click);
