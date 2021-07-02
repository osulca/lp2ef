<?php

namespace app\controladores;

use app\modelos\Ejemplar;

require_once "config/autoload.php";

class ControladorEjemplar
{
    public function mostrar()
    {
        $ejemplar = new Ejemplar();
        $resultado = $ejemplar->mostrar();
        return $resultado;
    }

    public function eliminar($id)
    {
        $ejemplar = new Ejemplar();

        $datos = $ejemplar->getDataById($id);
        foreach ($datos as $dato) {
            $estatus = $dato["estatus"];
        }

        if ($estatus == "disponible") {
            $afectados = $ejemplar->eliminar($id);
            if ($afectados != 0) {
                header("location: ejemplarVer.php");
            }
        } else {
            echo "no se puede eliminar un ejemplar prestado";
        }
    }

    public static function prestado($id)
    {
        $ejemplar = new Ejemplar();
        $ejemplar->prestado($id);
    }
}