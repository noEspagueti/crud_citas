<?php

class HomeModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCitas()
    {
        $data =   parent::selectAll('SELECT CONCAT(nombres," ", apellidos) as persona, descripcion, fecha, estatus FROM citas');
        return $data;
    }


    public function save($nombres, $apellidos, $descripcion, $fecha, $estatus)
    {
        $sql = "INSERT INTO citas(nombres,apellidos,descripcion,fecha,estatus) VALUES(?,?,?,?,?)";
        $list = array("nombres" => $nombres, "apellidos" => $apellidos, "descripcion" => $descripcion, "fecha" => $fecha, "estatus" => $estatus);
        $result = parent::insert($sql, $list);
        return $result;
    }
}
