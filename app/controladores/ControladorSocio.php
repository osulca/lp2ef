<?php
namespace app\controladores;

use app\modelos\Socio;

require_once "config/autoload.php";

class ControladorSocio
{
    public static function mostrar()
    {
        $socio = new Socio();
        $resultado = $socio->mostrar();
        return $resultado;
    }
}