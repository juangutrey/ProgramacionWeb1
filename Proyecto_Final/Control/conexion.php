<?php
//para servidor local:
    //$host_db="127.0.0.1";
    //$user_name="root";
    //$user_pass="";
    //$db_name="gimnasio_db";

    //$conexion = new mysqli($host_db,$user_name,$user_pass, $db_name);
    //if( $conexion -> connect_error){
    //    echo "<h1>Error de conexion </h1> ";
    //}
    //else{
    //   echo "<h1></h1>";
    //}

    // Configuración para InfinityFree
    //$host_db = "sql206.infinityfree.com";
    //$user_name = "if0_37732853";
    //$user_pass = "kjlqQRMxciUvmj";
    //$db_name = "if0_37732853_gimnasio_db";

    // Crear la conexión
    //$conexion = new mysqli($host_db, $user_name, $user_pass, $db_name);

    // Verificar si la conexión fue exitosa
    //if ($conexion->connect_error) {
    //die("<h1>Error de conexión: " . $conexion->connect_error . "</h1>");
    //} else {
    //echo "<h1></h1>";
    //}

    // Configuración para MV
    $servername = "localhost";
    $username = "juan";
    $password = "Corazon.2";
    $dbname = "prueba_bd";
// Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
    die("<h1>Error de conexión: " . $conn->connect_error . "</h1>");
    } else {
    echo "<h1></h1>";
    }
?>
