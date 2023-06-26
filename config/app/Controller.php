<?php
class Controller
{
    public $vista;
    public $modelo;
    public function __construct()
    {
        $this->vista = new Views();
        $this->modelo = $this->cargarModelo();
    }

    public function cargarModelo()
    {
        $modelo =  get_class($this) . "Model";
        $dirModelo = "model/" . $modelo . ".php";
        if (file_exists($dirModelo)) {
            require_once $dirModelo;
        }else{
            return null;
        }
        return new $modelo();
    }
}
