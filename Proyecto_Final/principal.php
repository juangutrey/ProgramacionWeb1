<?php include "./header.php"; ?>
<?php
session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION['id_miembro'])) {
    // Redirigir al login si no se ha iniciado sesión
    header("location: ./index.php?error=acceso_denegado");
    exit(); // Finaliza la ejecución del script
}

// Obtener el número de membresía del usuario
$id_miembro = $_SESSION['id_miembro'];

// Mostrar mensaje si hay uno en la URL
if (isset($_GET['msg'])) {
    echo "<div class='container center-align' style='margin-top: 20px;'>
            <h5 class='green-text'>" . htmlspecialchars($_GET['msg']) . "</h5>
          </div>";
}

// Mensaje de bienvenida con estilos
echo "<div class='container center-align' style='margin-top: 20px;'>
        <h4 class='blue-text text-darken-2'>¡Bienvenido al Gimnasio Aragon!</h4>
        <h5>Tu número membresia es: <span class='teal-text'>$id_miembro</span></h5>
      </div>";

echo "<div class='container center-align' style='margin-top: 20px;'>
        <a href='Control/exit.php' class='btn waves-effect waves-light orange lighten-1'>Cerrar Sesión</a>
      </div>";

// Conexión a la base de datos
require "./Control/conexion.php";
mysqli_set_charset($conexion, 'utf8');

// Consulta para obtener los miembros
$consulta_sql = "SELECT * FROM miembro";
$resultado = $conexion->query($consulta_sql);

if (!$resultado) {
    die("<h5 class='center-align red-text'>Error en la consulta: " . htmlspecialchars($conexion->error) . "</h5>");
}

// Tabla para mostrar registros
echo "<div class='container' style='overflow-x:auto; margin-top: 20px;'>
        <table class='highlight bordered responsive-table centered'>
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

if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
                <td>" . htmlspecialchars($row['nombre']) . "</td>
                <td>" . htmlspecialchars($row['id_miembro']) . "</td>
                <td>" . htmlspecialchars($row['direccion']) . "</td>
                <td>" . htmlspecialchars($row['telefono']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['fecha_registro']) . "</td>
                <td>" . htmlspecialchars($row['tipo_membresia']) . "</td>
                <td>" . htmlspecialchars($row['estado_cuenta']) . "</td>
              </tr>";
    }
} else {
    echo "<h5 class='center-align red-text'>No hay registros disponibles</h5>";
}

echo "  </tbody>
      </table>
    </div>";

// Botones para acciones
echo "<div class='container center-align' style='margin-top: 20px;'>
        <a href='eliminarUsuario.php' class='btn waves-effect waves-light red lighten-1' style='margin-right: 10px;'>Eliminar Miembro</a>
        <a href='registro.php' class='btn waves-effect waves-light green lighten-1'>Registrar Nuevo Miembro</a>
      </div>";
?>

<?php include "./footer.php"; ?>
