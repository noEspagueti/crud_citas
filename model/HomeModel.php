<?php

class HomeModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCitas()
    {
        $data =   parent::selectAll('SELECT id,CONCAT(nombres," ", apellidos) as persona, descripcion, fecha, estatus FROM citas');
        return $data;
    }

    public function getById($id)
    {
        $data = parent::select('SELECT id,CONCAT(nombres," ", apellidos) as persona, descripcion, fecha, estatus FROM  citas where id =' . $id);
        return $data;
    }

    public function save($nombres, $apellidos, $descripcion, $fecha, $estatus)
    {
        $sql = "INSERT INTO citas(nombres,apellidos,descripcion,fecha,estatus) VALUES(?,?,?,?,?)";
        $list = array($nombres, $apellidos, $descripcion, $fecha,  $estatus);
        $result = parent::insert($sql, $list);
        return $result;
    }

    public function updateStatus($status, $id)
    {
        $sql = "UPDATE `citas` SET `estatus` = ? WHERE `citas`.`id` = ?;";
        $data = array($status, $id);
        $result = parent::update($sql, $data);
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `citas` WHERE id = :id";
        $data = array(':id' => $id);
        $result = parent::remove($sql, $data);
        return $result;
    }
}
