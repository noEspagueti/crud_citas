<?php
class Home extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $datos = array("titulo" => "Panel de citas", "script" => "index.js");
        $this->vista->mostrarVista('inicio', 'init', $datos);
    }

    public function data()
    {
        $listCita = $this->modelo->getAllCitas();
        if (!empty($listCita)) {
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


    public function findById($id)
    {
        $data = $this->modelo->getById($id);
        if (empty($data)) {
            $res = array("result" => "not found 404", "type" => "error");
        } else {
            $res = $data;
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actualizarEstado()
    {
    }

    public function remove()
    {
        if ($_POST) {
            $id = intval($_POST["id"]);
            if (!empty($id)) {
                $result  = $this->modelo->delete($id);

                $res = array("result" => $result ? "Se ha eliminado correctamente la cita!" : "error al eliminar la cita", "type" => "ok");
            }
        } else {
            $res = array("result" => "error", "type" => "warning");
        }
        print json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
