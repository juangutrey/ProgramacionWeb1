<?php include "./ProyectoPW1/header.php"; ?>
<?php
include "./conexion.php";
mysqli_set_charset($conexion, 'utf8');

// Verificar que los campos no estén vacíos
if (empty($_POST['nombre']) || empty($_POST['id_miembro']) || empty($_POST['direccion']) || 
    empty($_POST['telefono']) || empty($_POST['email']) || 
    empty($_POST['fecha_nacimiento']) || empty($_POST['tipo_membresia']) || 
    empty($_POST['password'])) {
    echo "<span class='card-title red-text text-darken-2'>Error de Registro</span>";
    echo "<p>Todos los campos son obligatorios.</p>";
    echo "<a href='../registro.php' class='btn waves-effect waves-light blue'>Volver al formulario</a>";
    exit();
}

$nombreUser   = $_POST['nombre'];
$idMiembro = $_POST['id_miembro'];

// Intentar insertar el nuevo registro
try {
    // Verificar si el nombre ya existe
    $stmt = $conexion->prepare("SELECT * FROM miembro WHERE nombre = ?");
    $stmt->bind_param("s", $nombreUser );
    $stmt->execute();
    $resultadoUsuario = $stmt->get_result();
    $countUsuario = $resultadoUsuario->num_rows;

    // Verificar si el ID del miembro ya existe
    $stmt = $conexion->prepare("SELECT * FROM miembro WHERE id_miembro = ?");
    $stmt->bind_param("s", $idMiembro);
    $stmt->execute();
    $resultadoMiembro = $stmt->get_result();
    $countMiembro = $resultadoMiembro->num_rows;

    if ($countUsuario > 0) {
        echo "<span class='card-title red-text text-darken-2'>Error de Registro</span>";
        echo "<p>El nombre del miembro ya está registrado.</p>";
        echo "<a href='../registro.php' class='btn waves-effect waves-light blue'>Volver al formulario</a>";
    } elseif ($countMiembro > 0) {
        echo "<span class='card-title red-text text-darken-2'>Error de Registro</span>";
        echo "<p>El ID del miembro ya está registrado.</p>";
        echo "<a href='../registro.php' class='btn waves-effect waves-light blue'>Volver al formulario</a>";
    } else {
        // Si el nombre y el ID no existen, insertar el nuevo registro
        $stmt = $conexion->prepare("INSERT INTO miembro (nombre, direccion, telefono, email, fecha_nacimiento, tipo_membresia, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $passwordHashed = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashear la contraseña
        $stmt->bind_param("sssssss", $_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['email'], $_POST['fecha_nacimiento'], $_POST['tipo_membresia'], $passwordHashed);

        if ($stmt->execute()) {
            // Si el registro fue exitoso
            echo "<span class='card-title green-text text-darken-2'>¡Miembro registrado con éxito!</span>";
            echo "<p>El miembro ha sido registrado correctamente.</p>";
            echo "<a href='../Principal.php' class='btn waves-effect waves-light blue'>Ver registros</a>";
        } else {
            throw new Exception("Error al registrar el miembro: " . $conexion->error);
        }
    }
} catch (Exception $e) {
    // En caso de error en la base de datos
    echo "<span class='card-title red-text text-darken-2'>Error de Registro</span>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
    echo "<a href='../registro.php' class='btn waves-effect waves-light blue'>Volver al formulario</a>";
}
?>

<?php include "./ProyectoPW1/footer.php"; ?>

