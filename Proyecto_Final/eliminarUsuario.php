<?php include "./header.php"; ?>

<div class="container" style="max-width: 400px; margin-top: 50px;">
    <h4 class="center-align red-text text-darken-2">Eliminar Usuario</h4>
    
    <form method="POST" action="./Control/deleteUsuario.php" style="margin-top: 30px;">
        <div class="input-field">
            <label for="id_miembro">Número de Membresía</label>
            <input type="text" name="id_miembro" placeholder="Ingresa el número de membresía" required>
        </div>

        <div class="input-field">
            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Ingresa la contraseña" required>
        </div>
        
        <div class="center-align" style="margin-top: 20px;">
            <button type="submit" class="btn waves-effect waves-light red lighten-1">Eliminar Usuario</button>
        </div>
    </form>

    <div class="center-align" style="margin-top: 20px;">
        <a href="principal.php" class="btn waves-effect waves-light teal lighten-1">Regresar</a>
    </div>
</div>

<?php include "./footer.php"; ?>
