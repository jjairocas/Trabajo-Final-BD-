<?php

// Crear conexión con la BD
require('../config/conexion.php');

// Query SQL a la BD
$query = "SELECT * FROM ingrediente";
$query_insumo_de = "SELECT * FROM ingrediente WHERE nit_proveedor IS NULL";

// Ejecutar la consulta
$resultadoIngrediente = mysqli_query($conn, $query) or die(mysqli_error($conn));

$resultado_insumo_de = mysqli_query($conn, $query_insumo_de) or die(mysqli_error($conn));


mysqli_close($conn);