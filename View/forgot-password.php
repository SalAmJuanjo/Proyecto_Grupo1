<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Página de recuperación de cuenta de adminHMD">
  <title>Recuperar cuenta | adminHMD</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="auth-body">
  <button class="icon-button theme-toggle auth-theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
    <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
  </button>
  <main class="auth-page">
    <section class="auth-card">
      <a class="auth-brand" href="index.php"><span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span><span><strong>Bienvenido</strong><small>Recupere el acceso a su cuenta.</small></span></a>
      <form class="needs-validation" novalidate>
        <div class="mb-4">
          <p class="eyebrow mb-1">Acceso seguro</p>
          <h1 class="h3 mb-1">Recuperar cuenta</h1>
          <p class="text-muted mb-0">Ingrese su correo electrónico para recibir un enlace de recuperación.</p>
        </div>
        <div class="mb-4"><label class="form-label" for="forgotEmail">Correo electrónico</label><input class="form-control" id="forgotEmail" type="email" required><div class="invalid-feedback">Ingrese un correo válido.</div></div>
        <button class="btn btn-primary w-100" type="submit"><i class="bi bi-envelope-arrow-up" aria-hidden="true"></i> Enviar enlace de recuperación</button>
      </form>
      <p class="text-muted small mt-3 mb-0">Revise su bandeja de entrada y la carpeta de spam después de enviar la solicitud.</p>
      <div class="auth-footer">¿Recordó su contraseña? <a href="login.php">Volver al inicio de sesión</a></div>
    </section>
  </main>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
