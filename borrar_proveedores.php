<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

$con = mysqli_connect("localhost", "root", "", "mariscos_LERS"); // Creamos la conexión
if (!$con) {
    die('No se estableció la conexión con el servidor: ' . mysqli_connect_error());
}

if (isset($_POST['Id_Proveedor'])) {
    $id_proveedor = $_POST['Id_Proveedor'];

    if (!empty($id_proveedor)) {
        // Cambié 'clientes' a 'proveedores' para que la eliminación ocurra en la tabla correcta
        $sql = "DELETE FROM proveedores WHERE Id_Proveedor = '{$id_proveedor}'";
        
        if (mysqli_query($con, $sql)) {
            echo "Registro con ID Proveedor {$id_proveedor} ha sido borrado correctamente.<br><br>";
        } else {
            die('Error: ' . mysqli_error($con));
        }
    } else {
        echo "El campo 'ID Proveedor' no puede estar vacío.<br><br>";
    }

    echo "<a href='consulta_proveedores.php'>Regresar</a>";
} else {
    echo "No se ha recibido el ID del proveedor.<br><br>";
}

mysqli_close($con);
?>
