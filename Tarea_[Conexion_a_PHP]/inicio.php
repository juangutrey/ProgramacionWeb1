<?php
    include "conexion.php"; 
    $consulta_sql = "SELECT * FROM alumno";
    $resultado = $conexion ->query($consulta_sql);
    $count = mysqli_num_rows($resultado);

    echo "<table>";
        echo "<tr>";
            echo "<th> Alumno </th>";
            echo "<th> N. de cuenta </th>";
            echo "<th> Carrera </th>";
            echo "<th> Direccion </th>";
            echo "<th> Correo Electronico </th>";
            echo "<th> Fecha de registro </th>";
        echo "</tr>";

    if($count>0)
    {
        while( $row=mysqli_fetch_assoc($resultado))
        {
            echo "<tr>";
                echo "<td>".$row['nombre_usuario']. "</td>";
                echo "<td>".$row['no_cuenta']. "</td>";
                echo "<td>".$row['carrera']. "</td>";
                echo "<td>".$row['direccion']. "</td>";
                echo "<td>".$row['email']. "</td>";
                echo "<td>".$row['fecha_registro']. "</td>";
            echo "</tr>";
        }
    }
?>