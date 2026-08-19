<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Controller/UsuarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/View/LayoutInterno.php';
$datos = ObtenerDatosUsuario();

function MostrarDatoPerfil($dato)
{
    return htmlspecialchars((string) $dato, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<?php ImportCSS(); ?>

<body>
    <div class="admin-shell">
        <div class="sidebar-backdrop" data-sidebar-close></div>

        <?php Sidebar(); ?>
        <div class="admin-main">
            <?php navbar(); ?>
            <main class="dashboard-content">
                <div class="container-fluid px-3 px-lg-4 py-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2>Mi perfil</h2>
                            <p class="text-muted">Información de tu cuenta</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0 fw-semibold">
                                        <i class="ti ti-user me-2"></i>Datos del usuario
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-medium">Nombre</label>
                                            <p class="form-control-plaintext border-bottom mb-0"><?php echo MostrarDatoPerfil($datos["Nombre"]); ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-medium">Correo electrónico</label>
                                            <p class="form-control-plaintext border-bottom mb-0"><?php echo MostrarDatoPerfil($datos["CorreoElectronico"]); ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-medium">Número de usuario</label>
                                            <p class="form-control-plaintext border-bottom mb-0"><?php echo MostrarDatoPerfil($datos["Consecutivo"]); ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-medium">Rol</label>
                                            <p class="form-control-plaintext border-bottom mb-0"><?php echo MostrarDatoPerfil($datos["Rol"]); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <?php footer(); ?>
        </div>
    </div>
    <?php ImportJS(); ?>
</body>

</html>