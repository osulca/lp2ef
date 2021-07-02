<?php

use app\controladores\ControladorEjemplar;

require_once "config/autoload.php";

$controladorEjemplar = new ControladorEjemplar();
$id = $_GET["id"];
$controladorEjemplar->eliminar($id);
?>
