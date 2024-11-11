<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Consultar a los Clientes</title>
    <link rel="stylesheet" type="text/css" href="CSS.css"><!-- Especificamos el archivo CSS -->
</head>
<body>
    
</body>
    <center>
        <?php
            $con = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "mariscos_LERS"); // Creamos la conexión
            $resultado = mysqli_query($con, "SELECT * FROM clientes"); // Consultamos el contenido de la tabla clientes
            
            if ($resultado === FALSE) {
                echo "Fallo";
                die(mysqli_error($con)); // Muestra el error
            }
            
            echo "<center><font face='Arial'>";
            echo "<a href='consulta_clientes.php'>Actualizar tabla</a>";
            echo "<h1>Consulta de la tabla clientes</h1>";
            echo "<table border='1'>
                    <tr>
                        <th>Id_Cliente</th>
                        <th>Nombre_Cliente</th>
                        <th>Apellidos_Cliente</th>
                        <th>Telefono_Cliente</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                    </tr>";
            
            while ($row = mysqli_fetch_array($resultado)) { // Muestra el contenido de cada cliente
                echo "<tr>";
                echo "<td align='center'>" . $row['Id_Cliente'] . "</td>";
                echo "<td align='center'>" . $row['Nombre_Cliente'] . "</td>";
                echo "<td align='center'>" . $row['Ape_Cliente'] . "</td>";
                echo "<td align='center'>" . $row['Telefono'] . "</td>";
                echo "<td align='center'>" . $row['Correo'] . "</td>";
                echo "<td align='center'>" . $row['Dirección'] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
            $registros = mysqli_num_rows($resultado);
            echo "<br>Registros: " . $registros;
            
            mysqli_close($con); // Cerramos la conexión a la BD
        ?>
    </center>
</html>
<a href="inserta_clientes.html">Insertar</a>
<a href="borrar_clientes.html">Borrar</a>
<a href="actualizar_clientes.php">Actualizar</a>
<a href="seleccpagina.html">Volver al selector de paginas</a>
