<?php
session_start();
$_SESSION = []; // Vaciar las variables de sesión
session_destroy();
header("location: ../index.php");
exit();
?>