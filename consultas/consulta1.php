<?php
include "../includes/header.php";
?>


<h1 class="mt-3">Consulta 1</h1>

<p class="mt-3">
    Muestra el código y el nombre de los 2 ingredientes que son surtidos por los proveedores
    con más años en el mercado. Si hay más de un proveedor con la misma cantidad de años en el mercado,
    se lista alfabéticamente por el nombre del ingrediente.
</p>

<?php
// Crear conexión con la BD
require('../config/conexion.php');


$query = "SELECT ingrediente.codigo, ingrediente.nombre FROM ingrediente JOIN proveedor ON ingrediente.nit_proveedor = proveedor.nit ORDER BY proveedor.anios_en_mercado DESC, ingrediente.nombre ASC LIMIT 2";

$resultadoC1 = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);
?>

<?php

if($resultadoC1 and $resultadoC1->num_rows > 0):
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
            foreach ($resultadoC1 as $fila):
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