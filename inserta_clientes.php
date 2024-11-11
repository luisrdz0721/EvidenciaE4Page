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

    $sql = "INSERT INTO clientes (Id_Cliente, Nombre_Cliente, Ape_Cliente, Telefono, Correo, Dirección)
            VALUES ('$id_cliente', '$nombre_cliente', '$ape_cliente', '$telefono', '$correo', '$direccion')";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }

    echo "<center>";
    echo "1 registro agregado<br>";
    echo "<a href='consulta_clientes.php'>Ver registros</a>";
} else {
    echo "Faltan datos en el formulario.";
}

mysqli_close($con);
?>
