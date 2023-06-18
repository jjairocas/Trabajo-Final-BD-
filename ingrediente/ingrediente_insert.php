<?php
 
// Crear conexión con la BD
require('../config/conexion.php');

// Sacar los datos del formulario. Cada input se identifica con su "name"
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$precio_libra = $_POST["precio_libra"];
$categoria = $_POST["categoria"];
$insumo_de  = $_POST["insumo_de"];
$nit_proveedor = $_POST["nit_proveedor"];

if(empty($insumo_de)){
	$insumo_de = "NULL";
}

if(empty($nit_proveedor)){
	$nit_proveedor = "NULL";
}

// Query SQL a la BD. Si tienen que hacer comprobaciones, hacerlas acá (Generar una query diferente para casos especiales)
$query = "INSERT INTO `ingrediente`(`codigo`,`nombre`, `precio_libra`, `insumo_de`, `categoria`, `nit_proveedor` ) VALUES ('$codigo', '$nombre', '$precio_libra', $insumo_de,  '$categoria', $nit_proveedor)";

// Ejecutar consulta
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Redirigir al usuario a la misma pagina
if($result):
    // Si fue exitosa, redirigirse de nuevo a la página de la entidad
	header("Location: ingrediente.php");
else:
	echo "Ha ocurrido un error al crear la persona";
endif;

mysqli_close($conn);