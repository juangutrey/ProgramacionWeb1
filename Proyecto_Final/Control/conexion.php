<?php
    $host_db="127.0.0.1";
    $user_name="root";
    $user_pass="";
    $db_name="gimnasio_db";

    $conexion = new mysqli($host_db,$user_name,$user_pass, $db_name);
    if( $conexion -> connect_error){
        echo "<h1>Error de conexion </h1> ";
    }
    else{
        echo "<h1></h1>";
    }
?>