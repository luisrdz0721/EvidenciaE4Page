<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Actualizar Proveedor</title>
    <link rel="stylesheet" type="text/css" href="actualizar.css">
</head>
<body>
    <center>
        <?php
            // Conexión a la base de datos
            $con = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "mariscos_LERS"); 

            if (!$con) {
                die('No se pudo conectar a la base de datos: ' . mysqli_connect_error());
            }

            if (isset($_POST['id'])) {
                $id_proveedor = $_POST['id']; // Obtener el id del formulario
                
                $resultado = mysqli_query($con, "SELECT * FROM proveedores WHERE id_proveedor=$id_proveedor");
                
                if ($resultado === FALSE) {
                    die(mysqli_error($con)); // Mostrar error si la consulta falla
                }

                // Mostrar los datos para editar
                echo "<form action='Actualizar3_proveedores.php' method='POST'>";
                echo "<h1>Editar datos del Cliente</h1>";

                while ($row = mysqli_fetch_array(result: $resultado)) {
                    echo "<tr><td>Id_Proveedor</td><td><input type='text' name='idproveedor' value='" . $row['Id_Proveedor'] . "' readonly></td></tr>";
                    echo "<tr><td>Nombre_Proveedor</td><td><input type='text' name='nombre' value='" . $row['Nombre_Proveedor'] . "'></td></tr>";
                    echo "<tr><td>Ape_Proveedor</td><td><input type='text' name='apellidos' value='" . $row['Ape_Proveedor'] . "'></td></tr>";
                    echo "<tr><td>Telefono</td><td><input type='text' name='telefono' value='" . $row['Telefono'] . "'></td></tr>";
                    echo "<tr><td>Correo</td><td><input type='text' name='correo' value='" . $row['Correo'] . "'></td></tr>";
                    echo "<tr><td>Dirección_Negocio</td><td><input type='text' name='dirección' value='" . $row['Dirección_Negocio'] . "'></td></tr>";
                }

                echo "<input type='submit' value='Actualizar'/>";
                echo "</form>";
            } else {
                echo "No se ha recibido un ID válido.";
            }

            mysqli_close($con);
        ?>
    </center>
</body>
</html>
