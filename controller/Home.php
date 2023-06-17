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

    public function register()
    {
        if (isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['descripcion']) && isset($_POST['fecha'])) {
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $fecha = $_POST['fecha'];
            $descripcion = $_POST['descripcion'];
            if (empty($nombres) || empty($nombres) || empty($nombres) || empty($nombres)) {
                $res = array("result" => "Falta completar", "type" => "bad");
            } else {
                $data = $this->modelo->save($nombres, $apellidos, $descripcion, $fecha, 0);
                if ($data === 1) {
                    $res = array("result" => "Registro creado exitosamente", "type" => "ok");
                } else {
                    $res = array("result" => "Ha ocurrido un error", "type" => "bad");
                }
            }
            print json_encode($res, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
