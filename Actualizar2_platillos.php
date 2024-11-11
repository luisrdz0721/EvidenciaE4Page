<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Actualizar Cliente</title>
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
                $id_platillo = $_POST['id']; // Obtener el id del formulario
                
                $resultado = mysqli_query($con, "SELECT * FROM platillos WHERE id_platillo=$id_platillo");
                
                if ($resultado === FALSE) {
                    die(mysqli_error($con)); // Mostrar error si la consulta falla
                }

                // Mostrar los datos para editar
                echo "<form action='Actualizar3_platillos.php' method='POST'>";
                echo "<h1>Editar datos de los platillos</h1>";

                while ($row = mysqli_fetch_array(result: $resultado)) {
                    echo "<tr><td>Id_Platillo</td><td><input type='text' name='idplatillo' value='" . $row['Id_Platillo'] . "' readonly></td></tr>";
                    echo "<tr><td>Platillo</td><td><input type='text' name='platillo' value='" . $row['Platillo'] . "'></td></tr>";
                    echo "<tr><td>Categoria</td><td><input type='text' name='categoria' value='" . $row['Categoria'] . "'></td></tr>";
                    echo "<tr><td>Tiempo_Preparacion</td><td><input type='text' name='tiempo' value='" . $row['Tiempo_Preparacion'] . "'></td></tr>";
                    echo "<tr><td>Costo</td><td><input type='text' name='costo' value='" . $row['Costo'] . "'></td></tr>";
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
