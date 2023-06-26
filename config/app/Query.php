<?php
class Query
{
    protected $conectar;

    public function __construct()
    {
        $this->conectar = Conexion::getInstance();
    }


    public function select($consulta)
    {
        $stm = $this->conectar->prepare($consulta);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function selectAll($consulta)
    {
        $stm = $this->conectar->prepare($consulta);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($consulta, $data)
    {
        $stm = $this->conectar->prepare($consulta);
        $result = $stm->execute($data);
        if ($result) {
            return 1;
        }
        return 0;
    }

    public function update($consulta, $data)
    {
        $stm = $this->conectar->prepare($consulta);
        $result = $stm->execute($data);
        if ($result) {
            return 1;
        }
        return 0;
    }

    public function remove($consulta,$data)
    {
        $stm = $this->conectar->prepare($consulta);
        return $stm->execute($data);
    }
}
