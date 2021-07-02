<?php

namespace app\modelos;

use config\ConexionBD;

require_once "config/autoload.php";

class Socio
{
    private $nombre;
    private $email;

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function mostrar()
    {
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "SELECT * FROM socios";
            $resultado = $cnx->query($sql);
            $conexion->cerrar();
            return $resultado;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

}