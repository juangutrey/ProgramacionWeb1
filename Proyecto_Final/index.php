<?php
include "./header.php";
?>
<!-- Sección principal con un título, botones y texto -->
<div id="index-banner" class="section no-pad-bot gym-background">
  <div class="container">
    <h1 class="header center green-text text-lighten-2">Gimnasio Aragón</h1>
    <div class="row center">
      <h5 class="header col s12 light text-grey text-lighten-2">Tu espacio para un cuerpo más fuerte y saludable</h5>
    </div>
    <div class="row center">
      <!-- Botón que lleva al login -->
      <a href="login.php" id="login-button" class="btn-large waves-effect waves-light green lighten-1">Iniciar Sesión</a>
  </div>
</div>
<!-- Sección de contenido con tres bloques de servicios -->
<div class="container">
  <div class="section">
    <div class="row">
      <!--  Seguridad -->
      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center black-text text-darken-4"><i class="material-icons">security</i></h2>
          <h5 class="center black-text text-darken-2">Seguridad y Comodidad</h5>
          <p class="light">Accede a tus rutinas de manera segura, con equipos de última generación y un entorno cómodo.</p>
        </div>
      </div>

      <!-- Entrenamiento Personalizado -->
      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center black-text text-darken-4"><i class="material-icons">fitness_center</i></h2>
          <h5 class="center black-text text-darken-2">Entrenamiento Personalizado</h5>
          <p class="light">Nuestros entrenadores diseñan planes a medida para que logres tus objetivos más rápido y de manera efectiva.</p>
        </div>
      </div>

      <!-- Programas y Clases Grupales -->
      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center black-text text-darken-4"><i class="material-icons">event</i></h2>
          <h5 class="center black-text text-darken-2">Programas y Clases Grupales</h5>
          <p class="light">Participa en clases grupales motivadoras y programas especializados para mantenerte en movimiento.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="image-container">
    <img src="./media/img/imagenGimnasio.jpg" alt="Gimnasio" class="responsive-img">
</div>
<?php
  include "./footer.php"
?>