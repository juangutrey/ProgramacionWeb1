<?php include "./header.php"; ?>
<?php include "./Control/conexion.php";?>
<div class="container" style="margin-top: 20px;">
    <h4 class="center-align blue-text text-darken-2">Listado de Miembros Registrados</h4>
    
    <table class="striped">
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Fecha de Nacimiento</th>
                <th>Tipo de Membresía</th>
                <th>Correo Electrónico</th>
                <th>Número de Membresía</th>
                <th>Dirección</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consultar los registros de miembro
            $query = "SELECT nombre, fecha_nacimiento, tipo_membresia, email, id_miembro, direccion, telefono FROM miembro";
            $result = $conexion->query($query);

            if ($result->num_rows > 0) {
                // Mostrar cada registro en una fila de la tabla
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nombre']}</td>
                            <td>{$row['fecha_nacimiento']}</td>
                            <td>{$row['tipo_membresia']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['id_miembro']}</td>
                            <td>{$row['direccion']}</td>
                            <td>{$row['telefono']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='center-align'>No hay miembros registrados.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
    <div class="center-align" style="margin-top: 20px;">
        <a href="Registro.php" class="btn waves-effect waves-light green lighten-1">Registrar Nuevo Miembro</a>
    </div>
</div>

<?php include "./footer.php"; ?>