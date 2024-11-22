<?php include "./header.php"; ?>
<?php
require 'conexion.php'; 
session_start();

// Recibir datos del formulario
$id_miembro = $_POST['id_miembro']; 
$password = $_POST['password']; 

// Consulta para verificar credenciales
$q = "SELECT * FROM miembro WHERE id_miembro = '$id_miembro' AND password = '$password'";
$consulta = mysqli_query($conexion, $q);

// Verificar resultados
if (mysqli_num_rows($consulta) > 0) {
    $usuario = mysqli_fetch_assoc($consulta);
    // Guardar información en la sesión
    $_SESSION['id_miembro'] = $usuario['id_miembro'];
    $_SESSION['nombre'] = $usuario['nombre'];

    header("location: ../Principal.php");
} else {
    header("location: ../indexError.php");
}

// Para cerrar conexión
mysqli_close($conexion);
?>

<?php include "./footer.php"; ?>