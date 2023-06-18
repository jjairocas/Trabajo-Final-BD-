<?php
include "../includes/header.php";
?>

<!-- TÍTULO. Cambiarlo, pero dejar especificada la analogía -->
<h1 class="mt-3">Búsqueda 2</h1>

<p class="mt-3">
    
</p>

<div class="formulario p-4 m-3 border rounded-3">
    <form action="busqueda2.php" method="post" class="form-group">

        <div class="mb-3">
            <label for="fecha1" class="form-label">Fecha 1</label>
            <input type="date" class="form-control" id="fecha1" name="fecha1" required>
        </div>

        <div class="mb-3">
            <label for="fecha2" class="form-label">Fecha 2</label>
            <input type="date" class="form-control" id="fecha2" name="fecha2" required>
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    
</div>

<?php
// Dado que el action apunta a este mismo archivo, hay que hacer eata verificación antes
if ($_SERVER['REQUEST_METHOD'] === 'POST'):

    require('../config/conexion.php');

    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];

    $fecha1_parseada = date("YYYY-mm-dd", strtotime($fecha1));
    $fecha2_parseada = date("YYYY-mm-dd", strtotime($fecha2));

    if($fecha1_parseada < $fecha2_parseada){
        $query = "SELECT ingrediente.codigo, ingrediente.nombre FROM ingrediente JOIN proveedor ON ingrediente.nit_proveedor = proveedor.nit WHERE proveedor.fecha_vinculacion BETWEEN '$fecha1' AND '$fecha2'";
        $resultadoB2 = mysqli_query($conn, $query) or die(mysqli_error($conn));
        mysqli_close($conn);
        if($resultadoB2 and $resultadoB2->num_rows > 0){
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
                    foreach ($resultadoB2 as $fila):
                    ?>
                    <tr>
                        <!-- Cada una de las columnas, con su valor correspondiente -->
                        <td class="text-center"><?= $fila["codigo"]; ?></td>
                        <td class="text-center"><?= $fila["nombre"]; ?></td>
                    </tr>

                    <?php
                    // Cerrar los estructuras de control
                    endforeach;
                    ?>

                </tbody>
            </table>
            </div>
<?php
        } else{
?>
            <div class="alert alert-danger text-center mt-5">
                No se encontraron resultados para esta consulta
            </div>
<?php
        }
    }
    else{
?>
        <div class="alert alert-danger text-center mt-5">
            La fecha 1 debe ser menor a la fecha 2
        </div>
<?php

    }
endif;
include "../includes/footer.php";
?>