<?php

namespace app\modelos;

use config\ConexionBD;

require_once "config/autoload.php";

class Prestamo
{
    private $fecha_inicio;
    private $fecha_caducidad;
    private $fecha_retorno;
    private $id_ejemplar;
    private $id_socio;

    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFechaCaducidad()
    {
        return $this->fecha_caducidad;
    }

    public function setFechaCaducidad($fecha_caducidad)
    {
        $this->fecha_caducidad = $fecha_caducidad;
    }

    public function getFechaRetorno()
    {
        return $this->fecha_retorno;
    }

    public function setFechaRetorno($fecha_retorno)
    {
        $this->fecha_retorno = $fecha_retorno;
    }

    public function getIdEjemplar()
    {
        return $this->id_ejemplar;
    }

    public function setIdEjemplar($id_ejemplar)
    {
        $this->id_ejemplar = $id_ejemplar;
    }

    public function getIdSocio()
    {
        return $this->id_socio;
    }

    public function setIdSocio($id_socio)
    {
        $this->id_socio = $id_socio;
    }

    public function mostrar()
    {
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "SELECT lb.titulo, lb.autor, lb.isbn, ej.num_ejemplar, ej.estatus, pr.fecha_inicio, pr.fecha_caducidad, pr.id
                    FROM prestamos as pr
                    JOIN socios as sc
                    ON pr.id_socio = sc.id
                    JOIN ejemplars as ej 
                    ON pr.id_ejemplar = ej.id
                    JOIN libros as lb
                    ON ej.id_libro = lb.id";
            $resultado = $cnx->query($sql);
            $conexion->cerrar();
            return $resultado;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function guardar()
    {
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "INSERT INTO prestamos(fecha_inicio, fecha_caducidad, id_ejemplar, id_socio)
                    VALUES('$this->fecha_inicio', '$this->fecha_caducidad', $this->id_ejemplar, $this->id_socio)";
            $resultado = $cnx->exec($sql);
            $conexion->cerrar();
            return $resultado;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function prorrogar($id, $fecha_caducidad)
    {
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "UPDATE prestamos
                    SET fecha_caducidad = '$fecha_caducidad'
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
                    FROM prestamos 
                    WHERE id=$id";
            $resultado = $cnx->query($sql);
            $conexion->cerrar();
            return $resultado;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}