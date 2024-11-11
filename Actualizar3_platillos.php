<?php
$con = mysqli_connect("localhost", "root", "", "mariscos_LERS");

if (!$con) {
    die('No se pudo conectar a la base de datos: ' . mysqli_connect_error());
}

// Obtener los datos del formulario
$ID = $_POST['idplatillo']; 
$PLATILLO = $_POST['platillo']; 
$CATEGORIA = $_POST['categoria']; 
$TIEMPO = $_POST['tiempo']; 
$COSTO = $_POST['costo']; 

// Actualizar el cliente en la base de datos
$query = "UPDATE platillos SET 
            Platillo='$PLATILLO', 
            Categoria='$CATEGORIA', 
            Tiempo_Preparacion='$TIEMPO', 
            Costo='$COSTO' 
          WHERE Id_Platillo='$ID'";

if (!mysqli_query($con, $query)) {
    die('Error al actualizar: ' . mysqli_error($con));
}

// Redirigir después de la actualización
header("Location: actualizar_platillos.php");

mysqli_close($con); 
?>
