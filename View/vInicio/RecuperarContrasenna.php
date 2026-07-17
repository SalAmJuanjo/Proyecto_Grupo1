<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Avance2_Grupo1/Controller/InicioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Avance2_Grupo1/View/LayoutExterno.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php ImportCSS(); ?>

<body class="auth-body">
  <?php ThemeToggleButton(); ?>
  <?php Titulo(); ?>
    <main class="auth-page" style="align-items: start; justify-items: center; padding-top: 2rem;">
    <section class="auth-card" style="margin-top: 0;">
      <form action="" method="post" class="needs-validation mt-3" id="formRecuperarAcceso">
        <div class="mb-4">
          <h1 class="h3 mb-2">Recuperar cuenta</h1>
          <p class="eyebrow mb-1">Ingrese su correo electrónico para recibir un enlace de recuperación.</p>
        </div>
        <div class="mb-4">
          <label class="form-label" for="correoElectronico">Correo electrónico</label>
          <input class="form-control" id="correoElectronico" name="correoElectronico" type="email" required>
          <div class="invalid-feedback">Ingrese un correo válido.</div>
        </div>
        <?php
        if (isset($_SESSION["Mensaje"])) {
          echo '<div class="alert alert-danger text-center">'
            . $_SESSION["Mensaje"] . '</div>';
          unset($_SESSION["Mensaje"]);
        } 
        ?>
        <button id="btnRecuperarAcceso" name="btnRecuperarAcceso" class="btn btn-primary w-100" type="submit"><i class="bi bi-envelope-arrow-up" aria-hidden="true"></i> Enviar enlace de recuperación</button>
      </form>
      <p class="text-muted small mt-3 mb-0">Revise su bandeja de entrada y la carpeta de spam después de enviar la solicitud.</p>
      <div class="auth-footer">¿Recordó su contraseña? <a href="IniciarSesion.php">Volver al inicio de sesión</a></div>
    </section>
  </main>
  <?php ImportJS(); ?>
</body>

</html>