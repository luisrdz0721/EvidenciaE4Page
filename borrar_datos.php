<?php
$con = mysqli_connect(hostname:"localhost", username:"root", password:"", database:"mariscos_LERS"); // Creamos la conexión
if (!$con) {
    die('No se estableció la conexión con el servidor: ' . mysqli_connect_error());
}

// Verificar si el formulario ha enviado todos los datos necesarios
if (
    isset($_POST['Id_Cliente']) && isset($_POST['Nombre_Cliente']) && isset($_POST['Ape_Cliente']) &&
    isset($_POST['Telefono']) && isset($_POST['Correo']) && isset($_POST['Dirección'])
) {
    $id_cliente = $_POST['Id_Cliente'];
    $nombre_cliente = $_POST['Nombre_Cliente'];
    $ape_cliente = $_POST['Ape_Cliente'];
    $telefono = $_POST['Telefono'];
    $correo = $_POST['Correo'];
    $direccion = $_POST['Dirección'];

    $sql = "DELETE FROM clientes WHERE Id_Cliente = '{$_POST["Id_Cliente"]}'";
    if (!mysqli_query($con, $sql)) 
        die('Error: ' . mysqli_error($con));
    }echo "Registro borrado<br><br>";
    echo "<a href='borrar_clientes.php'>Regresar</a>";//llamamos a consultas para ver el nuevo registro


mysqli_close($con);
?>
