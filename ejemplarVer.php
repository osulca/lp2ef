<?php

use app\controladores\ControladorEjemplar;

require_once "config/autoload.php";

$controladorEjemplar = new ControladorEjemplar();
$datos = $controladorEjemplar->mostrar();
?>
    <h1>Consulta ejemplar</h1>
    <table border="1">
        <tr>
            <th>Libro</th>
            <th>Ejemplar</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php
        foreach ($datos as $ejemplar) {
            echo "<tr>
                    <td>
                        Titulo: " . $ejemplar["titulo"] . "<br>
                        Autor: " . $ejemplar["autor"] . "<br>
                        ISBN: " . $ejemplar["isbn"] . "
                    </td>
                    <td>
                        Nro Ejemplar: " . $ejemplar["num_ejemplar"] . "<br>
                        Estatus: " . $ejemplar["estatus"] . "
                    </td>
                    <td>
                        <a href='ejemplarEliminar.php?id=" . $ejemplar["id"] . "'>Eliminar</a>
                    </td>";
            if ($ejemplar["estatus"] == "disponible") {
                echo "<td><a href = 'prestamo.php?id=" . $ejemplar["id"] . "' > Prestar</a ></td>";
            } else {
                echo "<td> No disponible </td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
<?php
