<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Consultar los Platillos</title>
    <link rel="stylesheet" type="text/css" href="CSS.css"><!-- Especificamos el archivo CSS -->
</head>
<body>
    <center>
        <?php
            $con = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "mariscos_LERS"); // Creamos la conexión
            $resultado = mysqli_query($con, "SELECT * FROM platillos"); // Consultamos el contenido de la tabla clientes
            
            if ($resultado === FALSE) {
                echo "Fallo";
                die(mysqli_error($con)); // Muestra el error
            }
            
            echo "<center><font face='Arial'>";
            echo "<a href='consulta_platillos.php'>Actualizar tabla</a>";
            echo "<h1>Consulta de la tabla de 'Platillos'</h1>";
            echo "<table border='1'>
                    <tr>
                        <th>Id_Platillo</th>
                        <th>Platillo</th>
                        <th>Categoria</th>
                        <th>Tiempo_Preparacion</th>
                        <th>Costo</th>
                    </tr>";
            
            while ($row = mysqli_fetch_array($resultado)) { // Muestra el contenido de cada proveedor
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
            
            mysqli_close($con); // Cerramos la conexión a la BD
        ?>
    </center>
</html>
<a href="insertar_platillos.html">Insertar</a>
<a href="borrar_platillos.html">Borrar</a>
<a href="actualizar_platillos.php">Actualizar</a>
<a href="seleccpagina.html">Volver al selector de paginas</a>
