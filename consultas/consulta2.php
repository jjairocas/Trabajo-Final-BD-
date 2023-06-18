<?php
include "../includes/header.php";
?>

<h1 class="mt-3">Consulta 2</h1>

<p class="mt-3">
    Muestra el código y el nombre de los ingredientes que cumplen simultáneamente con las siguientes condiciones:
    <ul>
        <li>No son el insumo de ningún otro ingrediente</li>
        <li>No tienen proveedor, es decir, que son hechos a partir de otros ingredientes </li>

    </ul>
</p>
<?php
// Crear conexión con la BD
require('../config/conexion.php');


$query = "SELECT ingrediente.codigo, ingrediente.nombre FROM ingrediente WHERE ingrediente.insumo_de IS NULL AND ingrediente.nit_proveedor IS NULL";


$resultadoC2 = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);
?>

<?php
// Verificar si llegan datos
if($resultadoC2 and $resultadoC2->num_rows > 0):
?>


<div class="tabla mt-5 mx-3 rounded-3 overflow-hidden">

    <table class="table table-striped table-bordered">

        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">Código</th>
                <th scope="col" class="text-center">Nombre</th>
            </tr>
        </thead>

        <tbody>

            <?php
            foreach ($resultadoC2 as $fila):
            ?>

            <tr>
                <td class="text-center"><?= $fila["codigo"]; ?></td>
                <td class="text-center"><?= $fila["nombre"]; ?></td>
            </tr>

            <?php
            endforeach;
            ?>

        </tbody>

    </table>
</div>

<?php
else:
?>

<div class="alert alert-danger text-center mt-5">
    No se encontraron resultados para esta consulta
</div>

<?php
endif;

include "../includes/footer.php";
?>