<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/View/LayoutExterno.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Controller/InicioController.php';
?>
<!DOCTYPE html>
<html lang="es">

<?php ImportCSS(); ?>

<body class="auth-body">
  <?php ThemeToggleButton(); ?>
  <?php Titulo(); ?>
    <main class="auth-page" style="align-items: start; justify-items: center; padding-top: 2rem;">
    <section class="auth-card" style="margin-top: 0;">
      <form action="" method="post" class="needs-validation mt-3" id="formRegistrarUsuarios">
        <div class="mb-4">
          <h1 class="h3 mb-2">Registrar</h1>
          <p class="eyebrow mb-1">Ingresa tus datos para registrar tu cuenta.</p>
        </div>

        <div class="mb-3">
          <label class="form-label" for="nombre">Nombre completo</label>
          <input class="form-control" id="nombre" name="nombre" type="text" required>
          <div class="invalid-feedback">El nombre completo es requerido.</div>
        </div>

        <div class="mb-3">
          <label class="form-label" for="correoElectronico">Correo electrónico</label>
          <input class="form-control" id="correoElectronico" name="correoElectronico" type="email" required>
          <div class="invalid-feedback">Ingrese un correo electrónico válido.</div>
        </div>

        <div class="mb-3">
          <label class="form-label" for="contrasenna">Contraseña</label>
          <input class="form-control" id="contrasenna" name="contrasenna" type="password" minlength="6" required>
          <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres.</div>
        </div>

        <button id="btnRegistrar" name="btnRegistrar" class="btn btn-primary w-100" type="submit"><i class="bi bi-person-plus" aria-hidden="true"></i> Crear cuenta</button>
      </form>
      <div class="auth-footer">¿Ya tienes una cuenta? <a href="IniciarSesion.php">Iniciar sesión</a></div>
    </section>
  </main>
  <?php ImportJS(); ?>
</body>

</html>