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
                    <!-- Acá va el contenido de la herramienta de priorización -->
                    <h2>Herramienta de Priorización</h2>
                    <p>En progreso...</p>
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