<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="actualizar.css">
</head>
<body>
    <center>
        <?php
            $con = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "mariscos_LERS"); 
            
            if (!$con) {
                die('No se pudo conectar a la base de datos: ' . mysqli_connect_error());
            }
            
            $resultado = mysqli_query($con, "SELECT * FROM clientes"); 
            
            if ($resultado === FALSE) {
                echo "Error en la consulta.";
                die(mysqli_error($con)); 
            }

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
            
            while ($row = mysqli_fetch_array($resultado)) {
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

            mysqli_close($con);
        ?>
        <h3>Escribe el Id_Cliente del registro a editar</h3>
        <form action="Actualizar2_clientes.php" method="post">
            Id_Cliente: <input type="text" name="id" required/>
            <input type="submit" value="Editar"/>
        </form>
    </center>
</body>
</html>
