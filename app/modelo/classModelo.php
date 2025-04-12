<?php

//creamos la class Modelo que hereda de PDO (para poder interactuar con bases de datos)


class Modelo extends PDO
{

    protected $conexion; //conexion almacenara la conexion a la BD

    //constructor
    public function __construct()
    {
        //creamos la conexion

        $this->conexion = new PDO('mysql:host=' . Config::$mvc_bd_hostname . ';dbname=' . Config::$mvc_bd_nombre . '', Config::$mvc_bd_usuario, Config::$mvc_bd_clave);
        $this->conexion->exec("set names utf8");
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
?>