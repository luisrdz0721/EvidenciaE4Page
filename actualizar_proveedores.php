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
            
            $resultado = mysqli_query($con, "SELECT * FROM proveedores"); 
            
            if ($resultado === FALSE) {
                echo "Error en la consulta.";
                die(mysqli_error($con)); 
            }

            echo "<a href='consulta_clientes.php'>Actualizar tabla</a>";
            echo "<h1>Consulta de la tabla proveedores</h1>";
            echo "<table border='1'>
                    <tr>
                        <th>Id_Proveedor</th>
                        <th>Nombre_Proveedor</th>
                        <th>Apellidos_Proveedor/th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Dirección_Negocio</th>
                    </tr>";
            
            while ($row = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td align='center'>" . $row['Id_Proveedor'] . "</td>";
                echo "<td align='center'>" . $row['Nombre_Proveedor'] . "</td>";
                echo "<td align='center'>" . $row['Ape_Proveedor'] . "</td>";
                echo "<td align='center'>" . $row['Telefono'] . "</td>";
                echo "<td align='center'>" . $row['Correo'] . "</td>";
                echo "<td align='center'>" . $row['Dirección_Negocio'] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
            $registros = mysqli_num_rows($resultado);
            echo "<br>Registros: " . $registros;

            mysqli_close($con);
        ?>
        <h3>Escribe el Id_Proveedor del registro a editar</h3>
        <form action="Actualizar2_proveedores.php" method="post">
            Id_Proveedor: <input type="text" name="id" required/>
            <input type="submit" value="Editar"/>
        </form>
    </center>
</body>
</html>
