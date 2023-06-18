<?php
 
// Crear conexión con la BD
require('../config/conexion.php');

// Sacar los datos del formulario. Cada input se identifica con su "name"
$nit = $_POST["nit"];
$nombre = $_POST["nombre"];
$fecha_vinculacion = $_POST["fecha_vinculacion"];
$anios_en_mercado = $_POST["anios_en_mercado"];

// Query SQL a la BD. Si tienen que hacer comprobaciones, hacerlas acá (Generar una query diferente para casos especiales)
$query = "INSERT INTO `proveedor`(`nit`,`nombre`, `fecha_vinculacion`, `anios_en_mercado`) VALUES ('$nit', '$nombre', '$fecha_vinculacion', '$anios_en_mercado')";

// Ejecutar consulta
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Redirigir al usuario a la misma pagina
if($result):
    // Si fue exitosa, redirigirse de nuevo a la página de la entidad
	header("Location: proveedor.php");
else:
	echo "Ha ocurrido un error al crear el proveedor";
endif;

mysqli_close($conn);