<?php

namespace app\controladores;

use app\modelos\Prestamo;
use app\controladores\ControladorEjemplar;

require_once "config/autoload.php";

class ControladorPrestamo
{
    public function guardar($id_ejemplar, $id_socio)
    {
        $prestamo = new Prestamo();
        $prestamo->setFechaInicio(date("d/m/Y"));
        $prestamo->setFechaCaducidad(date("d/m/Y", time() + 432000));
        $prestamo->setIdEjemplar($id_ejemplar);
        $prestamo->setIdSocio($id_socio);
        $prestamo->guardar();
        ControladorEjemplar::prestado($id_ejemplar);
        header("location: ejemplarVer.php");
    }

    public function mostrar()
    {
        $prestamo = new Prestamo();
        $resultados = $prestamo->mostrar();
        return $resultados;
    }

    public function prorrogar($id, $dias)
    {
        $prestamo = new Prestamo();
        $datos = $prestamo->getDataById($id);

        $fecha_caducidad = "";
        foreach ($datos as $dato) {
            $fecha_caducidad = $dato["fecha_caducidad"];
        }

        $fecha_caducidad = date("Y-m-d", strtotime($fecha_caducidad));
        $fecha_prorrogada = date('d/m/Y', strtotime("+$dias days"));

        $prestamo->prorrogar($id, $fecha_prorrogada);
        header("location: prestamoVer.php");
    }
}