<?php
$dirControlador = "./controller/$controlador.php";

if (file_exists($dirControlador)) {

    require_once $dirControlador;

    $classControlador = new $controlador();

    if (method_exists($classControlador, $metodo)) {

        $classControlador->$metodo($parametros);
    } else {

        echo "No existe el metodo " . $metodo;
    }
} else {

    echo "No existe el controlador " . $controlador;
}
