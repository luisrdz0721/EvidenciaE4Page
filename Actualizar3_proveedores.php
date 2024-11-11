<?php
$con = mysqli_connect("localhost", "root", "", "mariscos_LERS");

if (!$con) {
    die('No se pudo conectar a la base de datos: ' . mysqli_connect_error());
}

// Obtener los datos del formulario
$ID = $_POST['idproveedor']; 
$NOMBRE = $_POST['nombre']; 
$APELLIDOS = $_POST['apellidos']; 
$TELEFONO = $_POST['telefono']; 
$CORREO = $_POST['correo']; 
$DIRECCION = $_POST['dirección']; 

// Actualizar el proveedor en la base de datos (cambié 'clientes' a 'proveedores' y 'Id_Cliente' a 'Id_Proveedor')
$query = "UPDATE proveedores SET 
            Nombre_Proveedor='$NOMBRE', 
            Ape_Proveedor='$APELLIDOS', 
            Telefono='$TELEFONO', 
            Correo='$CORREO', 
            Dirección_Negocio='$DIRECCION' 
            WHERE Id_Proveedor='$ID'";

if (!mysqli_query($con, $query)) {
    die('Error al actualizar: ' . mysqli_error($con));
}

// Redirigir después de la actualización
header("Location: actualizar_proveedores.php");

mysqli_close($con); 
?>
