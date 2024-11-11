<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

$con = mysqli_connect("localhost", "root", "", "mariscos_LERS"); // Creamos la conexión
if (!$con) {
    die('No se estableció la conexión con el servidor: ' . mysqli_connect_error());
}


if (isset($_POST['Id_Cliente'])) {
    $id_cliente = $_POST['Id_Cliente'];


    if (!empty($id_cliente)) {
        $sql = "DELETE FROM clientes WHERE Id_Cliente = '{$id_cliente}'";
        
 
        if (mysqli_query($con, $sql)) {
            echo "Registro con ID Cliente {$id_cliente} ha sido borrado correctamente.<br><br>";
        } else {
            die('Error: ' . mysqli_error($con));
        }
    } else {
        echo "El campo 'ID Cliente' no puede estar vacío.<br><br>";
    }

    echo "<a href='consulta_clientes.php'>Regresar</a>";
} else {
    echo "No se ha recibido el ID del cliente.<br><br>";
}

mysqli_close($con);
?>
