<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Avance2_Grupo1/View/LayoutExterno.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Avance2_Grupo1/Controller/InicioController.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php ImportCSS(); ?>


<body class="auth-body">
  <?php Titulo(); ?>
  <?php ThemeToggleButton(); ?>
  <main class="auth-page" style="align-items: start; justify-items: center; padding-top: 2rem;">
    <section class="auth-card" style="margin-top: 0;">
      <form action="" method="post" class="needs-validation mt-2" id="formIniciarSesion">
        <div class="mb-4">
          <h1 class="h3 mb-2">Iniciar sesión</h1>
          <p class="eyebrow mb-1">Ingresa tus datos para iniciar sesión en tu cuenta.</p>
        </div>

        <div class="mb-3">
          <label class="form-label" for="correoElectronico">Correo electrónico</label>
          <input class="form-control" id="correoElectronico" name="correoElectronico" type="email" required>
          <div class="invalid-feedback">Ingrese un correo electrónico válido.</div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="contrasenna">Contraseña</label><a class="small fw-semibold" href="RecuperarContrasenna.php">Olvidé mi contraseña</a>
          </div>
          <input class="form-control" id="contrasenna" name="contrasenna" type="password" minlength="6" required>
          <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres.</div>
        </div>

        <?php
        if (isset($_POST["Mensaje"])) {
          echo '<div class="alert alert-danger text-center">'
            . $_POST["Mensaje"] . '</div>';
        }
        ?>

        <button id="btnIniciarSesion" name="btnIniciarSesion" class="btn btn-primary w-100" type="submit"><i class="bi bi-box-arrow-in-right" aria-hidden="true"></i>Iniciar sesión</button>
      </form>
      <div class="auth-footer">¿Eres nuevo? <a href="RegistrarCuenta.php">Crea una cuenta</a></div>
    </section>
  </main>
  <?php ImportJS(); ?>
</body>

</html>