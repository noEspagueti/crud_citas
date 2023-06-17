<?php
class Conexion
{
    private static $conn = null;

    private static function setConnect()
    {
        try {

            $conectar = new PDO('mysql:host=' . HOST . ';dbname=' . BD_NAME, USER, PASS);
            $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conectar;
        } catch (PDOException $error) {
            echo "No se pudo establecer la conexión";
        }
    } 


    public static function getInstance(){
        if (empty(self::$conn) || self::$conn === null) {
            self::$conn = self::setConnect();
        }
        return self::$conn;
    }
}
