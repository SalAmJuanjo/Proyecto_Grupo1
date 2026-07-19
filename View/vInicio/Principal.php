<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/View/LayoutInterno.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php ImportCSS(); ?>

<body>
    <div class="admin-shell">
        <div class="sidebar-backdrop" data-sidebar-close></div>

        <?php aside(); ?>

        <div class="admin-main">
            <?php navbar(); ?>
            <main class="dashboard-content">
                <div class="container-fluid px-3 px-lg-4 py-4">
                    <div class="page-heading">
                        <div class="page-heading-copy">
                            <span class="page-icon"><i class="bi bi-speedometer2"></i></span>
                            <div>
                                <p class="eyebrow mb-1">SmartBridge – Gestión de puentes</p>
                                <h1 class="h3 mb-1">Centro de gestión</h1>
                                <p class="text-muted mb-0">Bienvenido,
                                    <?php echo isset($_SESSION['NombreUsuario']) ? htmlspecialchars($_SESSION['NombreUsuario'], ENT_QUOTES, 'UTF-8') : 'Usuario'; ?>
                                </p>
                            </div>
                        </div>
                        <div class="heading-actions">
                            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-download"></i>
                                Exportar</button>
                            <button class="btn btn-primary btn-sm"><i cla0ss="bi bi-file-earmark-plus"></i> Crear
                                reporte</button>
                        </div>
                    </div>

                    <!-- Acciones principales -->
                    <div class="row my-4">
                        <div class="col-md-4">
                            <a href="/Proyecto_Grupo1/View/vFunciones/RegistrarPuente.php"
                                class="btn btn-success w-100">Registrar un puente</a>
                        </div>
                        <div class="col-md-4">
                            <a href="/Proyecto_Grupo1/View/vFunciones/RealizarInspeccion.php"
                                class="btn btn-info w-100">Realizar inspección</a>
                        </div>
                        <div class="col-md-4">
                            <a href="/Proyecto_Grupo1/View/vFunciones/HerramientaPriorizacion.php"
                                class="btn btn-warning w-100">Herramienta de priorización</a>
                        </div>
                    </div>
                    <!-- Tabla de puentes -->
                    <div class="card">
                        <div class="card-header">Puentes registrados recientemente</div>
                        <div class="card-body position-relative">
                            <form method="post">
                                <button type="submit" id="btnmostrarpuentes" name="btnmostrarpuentes" class="btn btn-secondary float-end">
                                    <i class="bi bi-eye" aria-hidden="true"></i> Mostrar
                                </button>
                                <div id="puentesList">
                                    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Controller/PuenteController.php'; ?>
                                </div>
                            </form>
                            <table class="table table-striped">

                            </table>
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