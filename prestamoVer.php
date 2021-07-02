<?php
use app\controladores\ControladorPrestamo;

require_once "config/autoload.php";

$controladorPrestamo = new ControladorPrestamo();
$datos = $controladorPrestamo->mostrar();
?>
<h1>Consulta Prestamos</h1>
<table border="1">
    <tr>
        <th>Libro</th>
        <th>Ejemplar</th>
        <th>Prestamo</th>
        <th>&nbsp;</th>
    </tr>
    <?php
    foreach ($datos as $prestamo) {
        echo "<tr>
            <td>
                Titulo: " . $prestamo["titulo"] . "<br>
                Autor: " . $prestamo["autor"] . "<br>
                ISBN: " . $prestamo["isbn"] . "
            </td>
            <td>
                Nro Ejemplar: " . $prestamo["num_ejemplar"] . "<br>
                Estatus: " . $prestamo["estatus"] . "
            </td>
            <td>
                Fecha Inicio: " . $prestamo["fecha_inicio"] . "<br>
                Fecha Caducidad: " . $prestamo["fecha_caducidad"] . "<br>
            </td>
            <td><a href='prestamoProrroga.php?id=" . $prestamo["id"] . "'>Prorrogar</a></td>
        </tr>";
    }
    ?>
</table>
<?php
