<?php include "./header.php"; ?>

<div class="container" style="max-width: 400px; margin-top: 50px;">
    <h4 class="center-align green-text text-darken-2">Iniciar sesion</h4>

<form method="POST" action="Control/loguear.php">
    <div class="input-field">
        <input type="text" name="id_miembro" id="id_miembro" placeholder="Número de Membresia" required />
        <label for="id_miembro">Número de Membresia</label>
    </div>
    <div class="input-field">
        <input type="password" name="password" id="password" placeholder="Contraseña" required />
        <label for="password">Contraseña</label>
    </div>
    <div class="center-align">
        <button type="submit" class="btn-large waves-effect waves-light green lighten-1">Iniciar Sesión</button>
    </div>
</form>
</div>
<?php include "./footer.php"; ?>