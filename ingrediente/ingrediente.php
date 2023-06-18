<?php
include "../includes/header.php";
?>

<h1 class="mt-3">Entidad análoga a CLIENTE (INGREDIENTE)</h1>

<div class="formulario p-4 m-3 border rounded-3">
    <form action="ingrediente_insert.php" method="post" class="form-group">
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" required>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="precio_libra" class="form-label">Precio por libra</label>
            <input type="number" class="form-control" id="precio_libra" name="precio_libra" required>
        </div>

        <!-- Consultar lista de ingredientes que pueden ser insumo de otro ingrediente -->

        <div class="mb-3">
            <label for="insumo_de" class="form-label">Es insumo de</label>
            <select name="insumo_de" id="insumo_de" class="form-select">
                <option value="" selected> --Ninguno-- </option>
                <?php
                require("../ingrediente/ingrediente_select.php");
                if($resultado_insumo_de):
                    foreach ($resultado_insumo_de as $fila):
                ?>
                <option value="<?= $fila["codigo"]; ?>"><?= $fila["nombre"]; ?> - Cod. <?= $fila["codigo"]; ?></option>
                <?php
                    endforeach;
                endif;
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-control" id="categoria" name="categoria">
                <option value="" selected disabled hidden ></option>
                <option value="1">1 - Cárnicos</option>
                <option value="2">2 - Aderezos</option>
                <option value="3">3 - Lácteos</option>
                <option value="4">4 - Harinas</option>
                <option value="5">5 - Vegetales</option>
            </select>
        </div>
        <!-- Consultar la lista de proveedores y desplegarlos -->
        <div class="mb-3">
            <label for="nit_proveedor" class="form-label">NIT Proveedor</label>
            <select name="nit_proveedor" id="nit_proveedor" class="form-select">
                <option value="" selected></option>
                <?php
                // Importar el código del otro archivo
                require("../proveedor/proveedor_select.php");
            
                // Verificar si llegan datos
                if($resultadoProveedor):
                    // Iterar sobre los registros que llegaron
                    foreach ($resultadoProveedor as $fila):
                ?>
                <option value="<?= $fila["nit"]; ?>"><?= $fila["nombre"]; ?> - NIT <?= $fila["nit"]; ?></option>
                <?php
                    endforeach;
                endif;
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
    
</div>

<?php
// Importar el código del otro archivo
require("ingrediente_select.php");

// Verificar si llegan datos
if($resultadoIngrediente and $resultadoIngrediente->num_rows > 0):
?>

<div class="tabla mt-5 mx-3 rounded-3 overflow-hidden">

    <table class="table table-striped table-bordered">

        <!-- Títulos de la tabla, cambiarlos -->
        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">NIT</th>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Precio por libra</th>
                <th scope="col" class="text-center">Insumo de</th>
                <th scope="col" class="text-center">Categoría</th>
                <th scope="col" class="text-center">Proveedor</th>
                <th scope="col" class="text-center">Acciones</th>

            </tr>
        </thead>

        <tbody>

            <?php
            // Iterar sobre los registros que llegaron
            foreach ($resultadoIngrediente as $fila):
            ?>
            <tr>
                <td class="text-center"><?= $fila["codigo"]; ?></td>
                <td class="text-center"><?= $fila["nombre"]; ?></td>
                <td class="text-center"><?= $fila["precio_libra"];?></td>
                <td class="text-center"><?= $fila["insumo_de"];?></td>
                <td class="text-center"><?= $fila["categoria"];?></td>
                <td class="text-center"><?= $fila["nit_proveedor"];?></td>
                <td class="text-center">
                    <form action="ingrediente_delete.php" method="post">
                        <input hidden type="text" name="codigoEliminar" value="<?= $fila["codigo"]; ?>">
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