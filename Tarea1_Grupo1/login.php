<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
   content="Registro de usuarios para el sistema del Grupo 1. Ingrese sus credenciales para crear su cuenta de manera eficiente.">
  <title>Iniciar sesión | Grupo 1</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="auth-body">
  <button class="icon-button theme-toggle auth-theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
    <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
  </button>
  <main class="auth-page">
    <section class="auth-card">
      <a class="auth-brand" href="index.php"><span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span><span><strong>Bienvenido</strong><small>Crea tu cuenta.</small></span></a>
      <form class="needs-validation" novalidate>
        <div class="mb-4">
          <p class="eyebrow mb-1">Acceso seguro</p>
          <h1 class="h3 mb-1">Registrar</h1>
          <p class="text-muted mb-0">Crea tu cuenta de manera eficiente.</p>
        </div>
        <div class="mb-3"><label class="form-label" for="registerName">Nombre completo</label><input class="form-control" id="registerName" type="text" required>
          <div class="invalid-feedback">El nombre completo es requerido.</div>
        </div>
        <div class="mb-3"><label class="form-label" for="registerEmail">Correo electrónico</label><input class="form-control" id="registerEmail" type="email" required>
          <div class="invalid-feedback">Ingrese un correo electrónico válido.</div>
        </div>
        <div class="mb-3"><label class="form-label" for="registerPassword">Contraseña</label><input class="form-control" id="registerPassword" type="password" minlength="6" required>
          <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres.</div>
        </div>
        <div class="form-check mb-4"><input class="form-check-input" type="checkbox" id="terms" required><label class="form-check-label" for="terms">Estoy de acuerdo con los términos y condiciones</label>
          <div class="invalid-feedback">Debes aceptar los términos antes de continuar.</div>
        </div>
        <button class="btn btn-primary w-100" type="submit"><i class="bi bi-person-plus" aria-hidden="true"></i> Crear cuenta</button>
      </form>

      <div class="auth-footer">¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></div>
    </section>
  </main>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
