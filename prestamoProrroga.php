<?php
use app\controladores\ControladorPrestamo;

require_once "config/autoload.php";
$id = $_GET["id"];
?>
<h1>Prorroga de prestamo</h1>
<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
    <label>Ingrese cuantos dias desea prorrogar</label>
    <input type="number" name="dias">
    <input type="hidden" name="id_prestamo" value="<?=$id?>">
    <input type="submit" value="Ampliar">
</form>
<?php
if (!empty($_POST)) {
    $id_prestamo = $_POST["id_prestamo"];
    $dias = $_POST["dias"];
    $controladorPrestamo = new ControladorPrestamo();
    $controladorPrestamo->prorrogar($id_prestamo, $dias);
}
