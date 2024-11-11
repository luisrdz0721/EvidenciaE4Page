<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Consultar a los Proveedores</title>
    <link rel="stylesheet" type="text/css" href="CSS.css"><!-- Especificamos el archivo CSS -->
</head>
<body>
    <center>
        <?php
            $con = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "mariscos_LERS"); // Creamos la conexión
            $resultado = mysqli_query($con, "SELECT * FROM proveedores"); // Consultamos el contenido de la tabla proveedores
            
            if ($resultado === FALSE) {
                echo "Fallo";
                die(mysqli_error($con)); // Muestra el error
            }
            
            echo "<center><font face='Arial'>";
            echo "<a href='consulta_clientes.php'>Actualizar tabla</a>";
            echo "<h1>Consulta de la tabla proveedores</h1>";
            echo "<table border='1'>
                    <tr>
                        <th>Id_Proveedor</th>
                        <th>Nombre_Proveedor</th>
                        <th>Ape_Proveedor</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Dirección_Negocio</th>
                    </tr>";
            
            while ($row = mysqli_fetch_array($resultado)) { // Muestra el contenido de cada proveedor
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
            
            mysqli_close($con); // Cerramos la conexión a la BD
        ?>
    </center>
</html>
<a href="insertar_proveedores.html">Insertar</a>
<a href="borrar_proveedores.html">Borrar</a>
<a href="actualizar_proveedores.php">Actualizar</a>
<a href="seleccpagina.html">Volver al selector de paginas</a>
