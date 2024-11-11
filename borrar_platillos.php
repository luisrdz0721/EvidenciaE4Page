<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

$con = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "mariscos_LERS"); // Creamos la conexión
if (!$con) {
    die('No se estableció la conexión con el servidor: ' . mysqli_connect_error());
}


if (isset($_POST['Id_Platillo'])) {
    $id_platillo = $_POST['Id_Platillo'];


    if (!empty($id_platillo)) {
        $sql = "DELETE FROM platillos WHERE Id_Platillo = '{$id_platillo}'";
        
 
        if (mysqli_query($con, $sql)) {
            echo "Registro con ID Platillo {$id_platillo} ha sido borrado correctamente.<br><br>";
        } else {
            die('Error: ' . mysqli_error($con));
        }
    } else {
        echo "El campo 'ID Platillo' no puede estar vacío.<br><br>";
    }

    echo "<a href='consulta_platillos.php'>Regresar</a>";
} else {
    echo "No se ha recibido el ID del platillo.<br><br>";
}

mysqli_close($con);
?>
