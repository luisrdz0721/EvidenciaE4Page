<?php
$con = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "mariscos_LERS"); // Creamos la conexión
if (!$con) {
    die('No se estableció la conexión con el servidor: ' . mysqli_connect_error());
}

// Verificar si el formulario ha enviado todos los datos necesarios
if (
    isset($_POST['Id_Proveedor']) && isset($_POST['Nombre_Proveedor']) && isset($_POST['Ape_Proveedor']) &&
    isset($_POST['Telefono']) && isset($_POST['Correo']) && isset($_POST['Dirección_Negocio'])
) {
    $id_proveedor = $_POST['Id_Proveedor'];
    $nombre_proveedor = $_POST['Nombre_Proveedor'];
    $ape_proveedor = $_POST['Ape_Proveedor'];
    $telefono = $_POST['Telefono'];
    $correo = $_POST['Correo'];
    $direccion = $_POST['Dirección_Negocio'];

    // Modificado para insertar en la tabla 'proveedores'
    $sql = "INSERT INTO proveedores (Id_Proveedor, Nombre_Proveedor, Ape_Proveedor, Telefono, Correo, Dirección_Negocio)
            VALUES ('$id_proveedor', '$nombre_proveedor', '$ape_proveedor', '$telefono', '$correo', '$direccion')";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }

    echo "<center>";
    echo "1 registro agregado<br>";
    echo "<a href='consulta_proveedores.php'>Ver registros</a>";
} else {
    echo "Faltan datos en el formulario.";
}

mysqli_close($con);
?>
