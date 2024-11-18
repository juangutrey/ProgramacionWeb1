<?php include "./header.php"; ?>
<?php
// Incluir archivo de conexión a la base de datos
require 'conexion.php';
// Iniciar sesión para poder almacenar valores en las variables de sesión
session_start();

// Obtener los valores del formulario enviados por POST (id_miembro y password)
$id_miembro = $_POST['id_miembro'];
$password = $_POST['password'];

// Preparar la consulta para evitar inyección SQL
$q = "SELECT password FROM miembro WHERE id_miembro = ?";
$stmt = $conexion->prepare($q);
$stmt->bind_param("s", $id_miembro);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontró el usuario
if ($result->num_rows > 0) {
    $array = $result->fetch_assoc();
    // Verificar la contraseña
    if (password_verify($password, $array['password'])) {
        // La contraseña es correcta, se guarda el id_miembro en la variable de sesión
        $_SESSION['username'] = $id_miembro;

        // Redirigir al usuario a la página principal
        header("Location: ../Principal.php");
        exit; // Asegúrate de usar exit después de header para evitar que el script continúe ejecutándose
    } else {
        // La contraseña es incorrecta
        header("Location: ../indexError.php");
        exit; // Asegúrate de usar exit aquí también
    }
} else {
    // Si no existe el usuario con ese id_miembro, redirigir al usuario a la página de error
    header("Location: ../indexError.php");
    exit; // Asegúrate de usar exit aquí también
}
?>
<?php include "./footer.php"; ?>