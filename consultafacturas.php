<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Consultar las facturas</title>
    <link rel="stylesheet" type="text/css" href="CSS.css"><!-- Especificamos el archivo CSS -->
</head>
<body>
    <center>
        <?php
            $con = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "mariscos_LERS"); // Creamos la conexión
            $resultado = mysqli_query($con, "SELECT * FROM facturación"); // Consultamos el contenido de la tabla clientes
            
            if ($resultado === FALSE) {
                echo "Fallo";
                die(mysqli_error($con)); // Muestra el error
            }
            
            echo "<center><font face='Arial'>";
            echo "<a href='consulta_platillos.php'>Actualizar tabla</a>";
            echo "<h1>Consulta de la tabla de Facturas</h1>";
            echo "<table border='1'>
                    <tr>
                        <th>Id_Factura</th>
                        <th>Id_Cliente</th>
                        <th>Subtotal</th>
                        <th>IVA</th>
                        <th>Total</th>
                    </tr>";
            
            while ($row = mysqli_fetch_array($resultado)) { // Muestra el contenido de cada proveedor
                echo "<tr>";
                echo "<td align='center'>" . $row['Id_Factura'] . "</td>";
                echo "<td align='center'>" . $row['Id_Cliente'] . "</td>";
                echo "<td align='center'>" . $row['Subtotal'] . "</td>";
                echo "<td align='center'>" . $row['IVA'] . "</td>";
                echo "<td align='center'>" . $row['Total'] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
            $registros = mysqli_num_rows($resultado);
            echo "<br>Registros: " . $registros;
            
            mysqli_close($con); // Cerramos la conexión a la BD
        ?>
    </center>
    <a href="seleccpagina.html">Volver al selector de paginas</a>
</html>

