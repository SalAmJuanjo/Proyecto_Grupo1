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

        <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
            <div class="sidebar-header">
                <h5 class="text-center mt-3">Centro de gestión</h5>
            </div>

            <?php Navbar(); ?>

            <div class="sidebar-user">

            </div>
        </aside>

        <div class="admin-main">
            <nav class="navbar admin-navbar navbar-expand bg-white">
                <div class="container-fluid px-3 px-lg-4">
                    <form class="d-none d-md-flex ms-3 flex-grow-1" role="search">
                        <input class="form-control search-input" type="search" placeholder="Buscar reportes de puentes" aria-label="Search">
                    </form>

                    <div class="navbar-actions ms-auto">
                        <?php ThemeToggleButton(); ?>
                        <div class="dropdown">
                            <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <span class=""><?php echo isset($_SESSION['NombreUsuario']) ? htmlspecialchars($_SESSION['NombreUsuario'], ENT_QUOTES, 'UTF-8') : 'Usuario'; ?></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item">Perfil</a></li>
                                <li><a class="dropdown-item">Configuración de cuenta</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="dashboard-content">
                <div class="container-fluid px-3 px-lg-4 py-4">
                    <div class="page-heading">
                        <div class="page-heading-copy">
                            <span class="page-icon"><i class="bi bi-speedometer2"></i></span>
                            <div>
                                <p class="eyebrow mb-1">SmartBridge – Gestión de puentes</p>
                                <h1 class="h3 mb-1">Centro de gestión</h1>
                                <p class="text-muted mb-0">Bienvenido, <?php echo isset($_SESSION['NombreUsuario']) ? htmlspecialchars($_SESSION['NombreUsuario'], ENT_QUOTES, 'UTF-8') : 'Usuario'; ?></p>
                            </div>
                        </div>
                        <div class="heading-actions">
                            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-download"></i> Exportar</button>
                            <button class="btn btn-primary btn-sm"><i cla0ss="bi bi-file-earmark-plus"></i> Crear reporte</button>
                        </div>
                    </div>

                    <!-- Acciones principales -->
                    <div class="row my-4">
                        <div class="col-md-4">
                            <button class="btn btn-success w-100">Registrar un puente</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info w-100">Realizar inspección</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-warning w-100">Herramienta de priorización</button>
                        </div>
                    </div>

                    <!-- Tabla de puentes -->
                    <div class="card">
                        <div class="card-header">Puentes registrados recientemente</div>
                        <div class="card-body">
                            <table class="table table-striped">

                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="Grupo1-footer">
                <div class="container-fluid px-3 px-lg-4">
                    <span>Copyright 2026 Grupo 1. <br> Developed by <a target="_blank" class="fw-bold text-success">Grupo 1</a> • Distributed by <a target="_blank" class="fw-bold text-success" href="https://themewagon.com">Ambiente Web Cliente/Servidor</a></span>
                </div>
            </footer>
        </div>
    </div>
    <?php ImportJS(); ?>
</body>

</html>