<?php

namespace app\modelos;

use config\ConexionBD;

require_once "config/autoload.php";

class Ejemplar
{
    private $num_ejemplar;
    private $estatus;
    private $id_libro;

    public function getNumEjemplar()
    {
        return $this->num_ejemplar;
    }

    public function setNumEjemplar($num_ejemplar)
    {
        $this->num_ejemplar = $num_ejemplar;
    }

    public function getEstatus()
    {
        return $this->estatus;
    }

    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    public function getIdLibro()
    {
        return $this->id_libro;
    }

    public function setIdLibro($id_libro)
    {
        $this->id_libro = $id_libro;
    }

    public function mostrar()
    {
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "SELECT ej.id, ej.num_ejemplar, ej.estatus, lb.isbn, lb.titulo, lb.autor
                    FROM ejemplars as ej
                    JOIN libros as lb 
                    ON ej.id_libro = lb.id";
            $resultado = $cnx->query($sql);
            $conexion->cerrar();
            return $resultado;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function eliminar($id)
    {
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "DELETE FROM ejemplars WHERE id=$id";
            $resultado = $cnx->exec($sql);
            $conexion->cerrar();
            return $resultado;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function prestado($id)
    {
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "UPDATE ejemplars
                    SET estatus = 'prestado'
                    WHERE id=$id";
            $resultado = $cnx->exec($sql);
            $conexion->cerrar();
            return $resultado;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataById($id){
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "SELECT *
                    FROM ejemplars 
                    WHERE id=$id";
            $resultado = $cnx->query($sql);
            $conexion->cerrar();
            return $resultado;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

}