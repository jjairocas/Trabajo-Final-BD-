<?php
include "../includes/header.php";
?>

<h1 class="mt-3">Entidad análoga a CASILLERO (PROVEEDOR)</h1>

<div class="formulario p-4 m-3 border rounded-3">
    <form action="proveedor_insert.php" method="post" class="form-group">
        <div class="mb-3">
            <label for="nit" class="form-label">NIT</label>
            <input type="text" class="form-control" id="nit" name="nit" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="fecha_vinculacion" class="form-label">Fecha de vinculacion</label>
            <input type="date" class="form-control" id="fecha_vinculacion" name="fecha_vinculacion" required>
        </div>

        <div class="mb-3">
            <label for="anios_en_mercado" class="form-label">Años en el mercado</label>
            <input type="number" class="form-control" id="anios_en_mercado" name="anios_en_mercado" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
    
</div>

<?php
require("proveedor_select.php");

if($resultadoProveedor and $resultadoProveedor->num_rows > 0):
?>

<div class="tabla mt-5 mx-3 rounded-3 overflow-hidden">

    <table class="table table-striped table-bordered">
        
        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">NIT</th>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Fecha de vinculación</th>
                <th scope="col" class="text-center">Años en el mercado</th>
                <th scope="col" class="text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($resultadoProveedor as $fila):
            ?>

            <tr>
                <td class="text-center"><?= $fila["nit"]; ?></td>
                <td class="text-center"><?= $fila["nombre"]; ?></td>
                <td class="text-center"><?= $fila["fecha_vinculacion"]; ?></td>
                <td class="text-center"><?= $fila["anios_en_mercado"]; ?></td>               
                <td class="text-center">
                    <form action="proveedor_delete.php" method="post">
                        <input hidden type="text" name="nitEliminar" value="<?= $fila["nit"]; ?>">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>
<?php
endif;

include "../includes/footer.php";
?>