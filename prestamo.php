<?php
use app\controladores\ControladorSocio;
use app\controladores\ControladorPrestamo;

require_once "config/autoload.php";

$id = $_GET["id"];
$socios = ControladorSocio::mostrar();
?>
    <h1>Prestamo de Ejemplar</h1>
    El ejemplar con ID: <?= $id ?>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <label>se prestará al socio</label>
        <select name="socio">
            <?php
            foreach ($socios as $socio) {
                echo "<option value = '" . $socio["id"] . "' >" . $socio["nombre"] . "</option >";
            }
            ?>
        </select>
        <input type="hidden" name="ejemplar" value="<?= $id ?>">
        <input type="submit" value="Prestar">
    </form>
<?php
if (!empty($_POST)) {
    $id_ejemplar = $_POST["ejemplar"];
    $id_socio = $_POST["socio"];
    $controladorPrestamo = new ControladorPrestamo();
    $controladorPrestamo->guardar($id_ejemplar, $id_socio);
}