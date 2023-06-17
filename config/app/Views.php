<?php
class Views
{

    public function mostrarVista($ruta, $archivo, $datos = "")
    {   
        $dir = "";
        if ($ruta === 'inicio') {
            $dir =  "view/$archivo.php";
        } else {
            $dir =  "view/$ruta/$archivo.php";
        }
        require $dir;
    }
}
