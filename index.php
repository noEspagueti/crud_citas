<?php

require_once "config/config.php";

$urlParams = empty($_GET['url']) ? "home/index" : $_GET['url'];

$segmentos = explode("/", $urlParams);


$controlador = ucfirst($segmentos[0]);

$metodo = empty($segmentos[1]) ? "index" :  $segmentos[1];

$parametros = "";


if (count($segmentos) > 2) {
    for ($i = 2; $i <= count($segmentos) - 1; $i++) {
        $parametros .= $segmentos[$i] . ",";
    }
    $parametros = trim($parametros, ",");
}


require_once "config/app/Autoload.php";
require_once "library/core/Load.php";
