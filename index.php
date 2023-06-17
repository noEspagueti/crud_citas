<?php

require_once "config/config.php";

$urlParams = empty($_GET['url']) ? "home/index" : $_GET['url'];

$segmentos = explode("/", $urlParams);


$controlador = ucfirst($segmentos[0]);

$metodo = empty($segmentos[1]) ? "index" :  $segmentos[1];

$parametros = "";

if (count($segmentos) > 2) {

    for ($i = 2; $i <= count($segmentos); $i++) {
        $parametros .= $segmentos[$i] . ",";
    }

    $parametros = trim($parametros, ",");
}


require_once "config/app/Autoload.php";

$dirControlador = "./controller/$controlador.php";

if (file_exists($dirControlador)) {

    require_once $dirControlador;

    $classControlador = new $controlador();

    if (method_exists($classControlador, $metodo)) {

        $classControlador->$metodo();
    } else {

        echo "No existe el metodo " . $metodo;
    }
} else {

    echo "No existe el controlador " . $controlador;
}
