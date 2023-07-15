<?php

// date_default_timezone_set('America/La_Paz');
// echo password_hash('admin', PASSWORD_DEFAULT);
// exit();
require_once 'config/Config.php';
require_once 'config/Helpers.php';

$ruta = (!empty($_GET['url'])) ? $_GET['url'] : 'principal/index';
$array = explode('/', $ruta);
// print_r($array);
$controller = ucfirst($array[0]);
$metodo = 'index';
$parametro = '';
// método
if (!empty($array[1])) {
    if ($array[1] != '') {
        $metodo = $array[1];
    }
}
// parámetro
if (!empty($array[2])) {
    if ($array[2] != '') {
        for ($i=2; $i < count($array); $i++) { 
            $parametro .= $array[$i] . ',';
        }
        $parametro = trim($parametro, ',');
    }
}

require_once 'config/app/Autoload.php';
$dirController = 'controllers/' . $controller . '.php';
if (file_exists($dirController)) {
    require_once $dirController;
    $controller = new $controller();
    if (method_exists($controller, $metodo)) {
        $controller->$metodo($parametro);
    } else {
        // header('Location: ' . BASE_URL . 'principal/error404');
        echo 'No existe el método';
    }
} else {
    // header('Location: ' . BASE_URL . 'principal/error404');
    echo 'No existe el controlador';
}