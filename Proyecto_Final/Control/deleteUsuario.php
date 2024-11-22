<?php include "./header.php"; ?>
<?php
require 'conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $id_miembro = $_POST['id_miembro'];
    $password = $_POST['password'];

    // Consulta para obtener la contraseña
    $query = "SELECT password FROM miembro WHERE id_miembro = '$id_miembro'";
    $result = mysqli_query($conexion, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        // Obtener la contraseña guardada en la base de datos
        $row = mysqli_fetch_assoc($result);
        $password_db = $row['password'];

        if ($password === $password_db) {
            // Si la contraseña es correcta, proceder a eliminar el usuario
            $delete_query = "DELETE FROM miembro WHERE id_miembro = '$id_miembro'";
            //usando las targetas de mensaje y botones de materialize
            if (mysqli_query($conexion, $delete_query)) {
                echo "
                <div class='row'>
                    <div class='col s12 m6 offset-m3'>
                        <div class='card green lighten-4'>
                            <div class='card-content center-align'>
                                <span class='card-title green-text text-darken-2'>¡Éxito!</span>
                                <p>El usuario ha sido eliminado exitosamente.</p>
                                <a href='../Principal.php' class='btn waves-effect waves-light green'>Regresar al Principal</a>
                            </div>
                        </div>
                    </div>
                </div>";
            } else {
                echo "
                <div class='row'>
                    <div class='col s12 m6 offset-m3'>
                        <div class='card red lighten-4'>
                            <div class='card-content center-align'>
                                <span class='card-title red-text text-darken-2'>Error</span>
                                <p>Error al eliminar el usuario: " . htmlspecialchars(mysqli_error($conexion)) . "</p>
                                <a href='../Principal.php' class='btn waves-effect waves-light red'>Regresar al Principal</a>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "
            <div class='row'>
                <div class='col s12 m6 offset-m3'>
                    <div class='card orange lighten-4'>
                        <div class='card-content center-align'>
                            <span class='card-title orange-text text-darken-2'>Error</span>
                            <p>La contraseña ingresada es incorrecta.</p>
                            <a href='../Principal.php' class='btn waves-effect waves-light orange'>Regresar al Principal</a>
                        </div>
                    </div>
                </div>
            </div>";
        }
    } else {
        echo "
        <div class='row'>
            <div class='col s12 m6 offset-m3'>
                <div class='card red lighten-4'>
                    <div class='card-content center-align'>
                        <span class='card-title red-text text-darken-2'>Error</span>
                        <p>El número de membresía no existe.</p>
                        <a href='../Principal.php' class='btn waves-effect waves-light red'>Regresar al Principal</a>
                    </div>
                </div>
            </div>
        </div>";
    }
}
?>
<?php include "./footer.php"; ?>
