<?php

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

$res = array('autentificado' => false, 'nombre' => NULL);

if ($username == 'admin' && $password == 'admin') {
    $res['autentificado'] = true;
    $res['nombre'] = 'El Admin del Sitio (ñàáç)';
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($res);
