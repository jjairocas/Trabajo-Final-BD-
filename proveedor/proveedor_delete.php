<?php
 
// Crear conexión con la BD
require('../config/conexion.php');

// Sacar la CP de la entidad
$nitEliminar = $_POST["nitEliminar"];

// Query SQL a la BD
$query = "DELETE FROM proveedor WHERE nit = '$nitEliminar'";

// Ejecutar consulta
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result): 
    // Si fue exitosa, redirigirse de nuevo a la página de la entidad
    header ("Location: proveedor.php");
else:
    echo "Ha ocurrido un error al eliminar este proveedor";
endif;
 
mysqli_close($conn);