<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="CSS.css">
</head>
<body>
    <center>
        <?php
            $con = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "mariscos_LERS"); 
            
            if (!$con) {
                die('No se pudo conectar a la base de datos: ' . mysqli_connect_error());
            }
            
            $resultado = mysqli_query($con, "SELECT * FROM platillos"); 
            
            if ($resultado === FALSE) {
                echo "Error en la consulta.";
                die(mysqli_error($con)); 
            }

            echo "<a href='consulta_clientes.php'>Actualizar tabla</a>";
            echo "<h1>Consulta de la tabla platillos</h1>";
            echo "<table border='1'>
                    <tr>
                        <th>Id_Platillo</th>
                        <th>Platillo</th>
                        <th>Categoria</th>
                        <th>Tiempo_Preparacion</th>
                        <th>Costo</th>
                    </tr>";
            
            while ($row = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td align='center'>" . $row['Id_Platillo'] . "</td>";
                echo "<td align='center'>" . $row['Platillo'] . "</td>";
                echo "<td align='center'>" . $row['Categoria'] . "</td>";
                echo "<td align='center'>" . $row['Tiempo_Preparacion'] . "</td>";
                echo "<td align='center'>" . $row['Costo'] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
            $registros = mysqli_num_rows($resultado);
            echo "<br>Registros: " . $registros;

            mysqli_close($con);
        ?>
        <h3>Escribe el Id_Platillo del registro a editar</h3>
        <form action="Actualizar2_platillos.php" method="post">
            Id_Platillo: <input type="text" name="id" required/>
            <input type="submit" value="Editar"/>
        </form>
    </center>
</body>
</html>
