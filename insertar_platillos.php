<?php
$con = mysqli_connect(hostname:"localhost", username:"root", password:"", database:"mariscos_LERS"); // Creamos la conexión
if (!$con) {
    die('No se estableció la conexión con el servidor: ' . mysqli_connect_error());
}

// Verificar si el formulario ha enviado todos los datos necesarios
if (
    isset($_POST['Id_Platillo']) && isset($_POST['Platillo']) && isset($_POST['Categoria']) &&
    isset($_POST['Tiempo_Preparacion']) && isset($_POST['Costo'])
) {
    $id_platillo = $_POST['Id_Platillo'];
    $platillo = $_POST['Platillo'];
    $categoria = $_POST['Categoria'];
    $tiempoprep = $_POST['Tiempo_Preparacion'];
    $costo = $_POST['Costo'];

    $sql = "INSERT INTO platillos (Id_Platillo, Platillo, Categoria, Tiempo_Preparacion, Costo)
            VALUES ('$id_platillo', '$platillo', '$categoria', '$tiempoprep', '$costo')";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }

    echo "<center>";
    echo "1 registro agregado<br>";
    echo "<a href='consulta_platillos.php'>Ver registros</a>";
} else {
    echo "Faltan datos en el formulario.";
}

mysqli_close($con);
?>
