<?php
    $con = mysqli_connect("localhost", "root", "", "mariscos_LERS");

    if (!$con) {
        die('No se pudo conectar a la base de datos: ' . mysqli_connect_error());
    }

    // Obtener los datos del formulario
    $ID = $_POST['idcliente']; 
    $NOMBRE = $_POST['nombre']; 
    $APELLIDOS = $_POST['apellidos']; 
    $TELEFONO = $_POST['telefono']; 
    $CORREO = $_POST['correo']; 
    $DIRECCION = $_POST['dirección']; 

    // Actualizar el cliente en la base de datos
    $query = "UPDATE clientes SET 
                Nombre_Cliente='$NOMBRE', 
                Ape_Cliente='$APELLIDOS', 
                Telefono='$TELEFONO', 
                Correo='$CORREO', 
                Dirección='$DIRECCION' 
                WHERE Id_Cliente='$ID'";

    if (!mysqli_query($con, $query)) {
        die('Error al actualizar: ' . mysqli_error($con));
    }

    // Redirigir después de la actualización
    header("Location: actualizar_clientes.php");

    mysqli_close($con); 
?>
