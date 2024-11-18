<?php
require "conexion.php";
mysqli_set_charset($conexion, 'utf8');

// Recibir el ID del miembro a eliminar desde el formulario.
$registroEliminado = $_POST['id_miembro'];

// Consulta para eliminar el miembro por su ID.
$consulta = "DELETE FROM miembro WHERE id_miembro = ?";

// Preparar la consulta para evitar inyección SQL.
$stmt = $conexion->prepare($consulta);
$stmt->bind_param("i", $registroEliminado);

// Ejecutar la consulta.
$stmt->execute();

// Cerrar la conexión.
$stmt->close();
$conexion->close();

// Redirigir al usuario a la página de gestión de miembros.
header('Location: ../EliminarUsuario.php');
exit;
?>
