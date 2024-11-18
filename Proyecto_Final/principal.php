<?php include "./header.php"; ?>
<?php
session_start();
$id_miembro = $_SESSION['usermane']; // Número de membresía del usuario

if (!isset($id_miembro)) {
    header("location: ./index.php");
    exit(); // Asegúrate de salir después de redirigir
} else {
    // Mensaje de bienvenida con estilos
    echo "<div class='container center-align' style='margin-top: 20px;'>
            <h4 class='blue-text text-darken-2'>¡Bienvenido al Gimnasio Aragon!</h4>
            <h5>Tu número de cuenta es <span class='teal-text'>$id_miembro</span></h5>
          </div>";

    echo "<div class='container center-align' style='margin-top: 20px;'>
            <a href='Controlador/exit.php' class='btn waves-effect waves-light teal lighten-1'>Cerrar Sesión</a>
          </div>";
    
    // Se usa el require para incluir el archivo de conexión a la base de datos
    require "./Control/conexion.php";
    mysqli_set_charset($conexion, 'utf8');

    // Consultar los datos de los usuarios (miembros) del gimnasio
    $consulta_sql = "SELECT * FROM miembro"; 

    // Ejecutar la consulta y almacenar el resultado
    $resultado = $conexion->query($consulta_sql);
    if (!$resultado) {
        die("Error en la consulta: " . $conexion->error);
    }

    // Contar el número de filas del resultado
    $count = mysqli_num_rows($resultado);

    // Contenedor con tabla para mostrar los datos
    echo "<div class='container' style='overflow-x:auto; margin-top: 20px;'>";
    echo "<table class='highlight bordered responsive-table centered'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>No. Membresía</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Fecha de Registro</th>
                    <th>Plan</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>";

    if ($count > 0) {
        // Mostrar los registros de la base de datos
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_miembro']) . "</td>";
            echo "<td>" . htmlspecialchars($row['direccion']) . "</td>";
            echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['fecha_registro']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tipo_membresia']) . "</td>";
            echo "<td>" . htmlspecialchars($row['estado_cuenta']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<h5 class='center-align red-text'>No hay registros disponibles</h5>";
    }

    echo "</div>"; // Cierra el contenedor de la tabla

    // Enlaces para eliminar un miembro o agregar uno nuevo
    echo "<div class='container center-align' style='margin-top: 20px;'>
            <a href='deleteUsuario.php' class='btn waves-effect waves-light red lighten-1' style='margin-right: 10px;'>Eliminar Miembro</a>
            <a href='RegistroMiembro.php' class='btn waves-effect waves-light blue lighten-1'>Registrar Nuevo Miembro</a>
          </div>";
}
?>

<?php include "./footer.php"; ?>