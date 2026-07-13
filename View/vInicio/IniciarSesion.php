<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Avance2_Grupo1/View/LayoutExterno.php';
?>
<!DOCTYPE html>
<html lang="es">

<?php ImportCSS(); ?>

<body class="auth-body">
  <?php ThemeToggleButton(); ?>
  <main class="auth-page">
    <section class="auth-card">
      <a class="auth-brand" href="IniciarSesion.php"><span class="brand-icon"><i class="bi bi-grid-1x2-fill"
            aria-hidden="true"></i></span><span><strong>Bienvenido</strong><small>Inicie sesión para acceder a su
            cuenta.</small></span></a>
      <form class="needs-validation" novalidate>
        <div class="mb-4">
          <h1 class="h3 mb-1">Iniciar sesión</h1>
        </div>
        <div class="mb-3"><label class="form-label" for="loginEmail">Correo electrónico</label><input
            class="form-control" id="loginEmail" type="email" required>
          <div class="invalid-feedback">Ingrese un correo electrónico válido.</div>
        </div>
        <div class="mb-3">
          <div class="d-flex justify-content-between"><label class="form-label" for="loginPassword">Contraseña</label><a
              class="small fw-semibold" href="forgot-password.php">Olvidé mi contraseña</a></div><input
            class="form-control" id="loginPassword" type="password" minlength="6" required>
          <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres.</div>
        </div>
        <div class="form-check mb-4"><input class="form-check-input" type="checkbox" id="rememberMe"><label
            class="form-check-label" for="rememberMe">Recordar mi contraseña</label></div>
        <button class="btn btn-primary w-100" type="submit"><i class="bi bi-box-arrow-in-right" aria-hidden="true"></i>
          Iniciar sesión</button>
      </form>

      <div class="auth-footer">¿Eres nuevo? <a href="RegistrarCuenta.php">Crea una cuenta</a></div>
    </section>
  </main>

  <script src="../js/main.js"></script>
  <?php ImportJS(); ?>
</body>

</html>