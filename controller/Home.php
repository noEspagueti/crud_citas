<?php
class Home extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $datos = array("titulo" => "Panel de citas", "script" => "registro.js");
        $this->vista->mostrarVista('inicio', 'init', $datos);
    }

    public function data()
    {
        $listCita = $this->modelo->getAllCitas();

        if (!empty($listCita)) {
            for ($i = 0; $i < count($listCita); $i++) {
                $listCita[$i]["estatus"] = $listCita[$i]["estatus"] === 0 ? "<pan class='pending'>Pendiente</pan>" : "<span class ='fullize'>Realizado</span>";
                $listCita[$i]["acciones"] = "<div class='btn-group' role='group' aria-label='Button group'>
                <button class='btn_edit' type='button'>
                <span class='material-symbols-outlined'>
                edit</span></button><button class='btn_delete' type='button'><span class='material-symbols-outlined'>delete</span></button></div>";
            }
            $res = $listCita;
        } else {
            $res = array("msg" => "error");
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
