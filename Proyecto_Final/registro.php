<?php include "./header.php"; ?>

<div class="container" style="max-width: 600px; margin-top: 20px;">
    <h4 class="center-align blue-text text-darken-2">Registro de Miembro</h4>
    
    <form action="./Control/enviarRegistro.php" method="post" style="margin-top: 20px;">
        <div class="input-field">
            <label for="nombre">Nombre Completo:</label>
            <input type="text" name="nombre" required maxlength="100" placeholder="Ingresa tu nombre completo">
        </div>
        
        <div class="input-field">
            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required placeholder="Ingresa tu fecha de nacimiento">
        </div>

        <div class="input-field">
            <label for="tipo_membresia">Tipo de Membresía:</label>
            <input type="text" name="tipo_membresia" required maxlength="100" placeholder="Ingresa tu plan de membresía">
        </div>
        
        <div class="input-field">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" required maxlength="100" placeholder="Ingresa tu correo electrónico">
        </div>
        
        <div class="input-field">
            <label for="id_miembro">Número de Membresía:</label>
            <input type="text" name="id_miembro" required maxlength="100" placeholder="Ingresa tu número de membresía">
        </div>
        
        <div class="input-field">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" required maxlength="100" placeholder="Ingresa tu dirección">
        </div>
        
        <div class="input-field">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required maxlength="10" placeholder="Ingresa tu número de teléfono">
        </div>
        
        <div class="input-field">
            <label for="password">Contraseña:</label>
            <input type="password" name="contraseña" required maxlength="255" placeholder="Ingresa tu contraseña">
        </div>
        
        <div class="center-align" style="margin-top: 20px;">
            <button type="submit" name="submit" class="btn waves-effect waves-light blue lighten-1">Enviar Registro</button>
        </div>
    </form>

    <!-- Enlace adicional -->
    <div class="center-align" style="margin-top: 20px;">
        <a href="Principal.php" class="btn waves-effect waves-light teal lighten-1">Regresar</a>
    </div>
    <!-- Para ver registros -->
    <div class="center-align" style="margin-top: 20px;">
    <a href="verRegistros.php" class="btn waves-effect waves-light teal lighten-1">Ver Listado de Miembros</a>
    </div>

</div>

<?php include "./footer.php"; ?>