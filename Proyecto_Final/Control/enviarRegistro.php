<?php include "./header.php"; ?>
<?php
include "./conexion.php";

mysqli_set_charset($conexion, 'utf8');
// Para recibir datos del formulario
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$tipo_membresia = $_POST['tipo_membresia'];
$password = $_POST['password'];
$id_miembro = $_POST['id_miembro']; 

// Sirve para verificar si el miembro ya está registrado por email o id_miembro
$buscarMiembro = "SELECT * FROM miembro WHERE email = '$email' OR id_miembro = '$id_miembro'";
$resultado = $conexion->query($buscarMiembro);

if (mysqli_num_rows($resultado) > 0) {
    echo "<h4 class='center-align red-text'>El miembro ya está registrado.</h4>";
    echo "<div class='center-align'>
            <a href='../registro.php' class='btn waves-effect waves-light blue lighten-1'>Nuevo registro</a>
          </div>";
} else {
    // Insertamos el nuevo miembro con el id_miembro proporcionado por el usuario
    $insertarMiembro = "INSERT INTO miembro (
        id_miembro, nombre, direccion, telefono, email, fecha_nacimiento, tipo_membresia, password
    ) VALUES (
        '$id_miembro', '$nombre', '$direccion', '$telefono', '$email', '$fecha_nacimiento', '$tipo_membresia', '$password'
    )";

    if (mysqli_query($conexion, $insertarMiembro)) {
        echo "<h4 class='center-align green-text'>Miembro registrado con éxito.</h4>";
        echo "<div class='center-align'>
                <a href='../registro.php' class='btn waves-effect waves-light blue lighten-1'>Registrar otro miembro</a>
                <a href='../principal.php' class='btn waves-effect waves-light teal lighten-1'>Ver registros</a>
              </div>";
    } else {
        echo "<h4 class='center-align red-text'>Error al registrar el miembro:</h4>";
        echo "<p>" . mysqli_error($conexion) . "</p>";
    }
}

mysqli_close($conexion);
?>

<?php include "./footer.php"; ?>
