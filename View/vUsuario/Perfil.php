<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Controller/UsuarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/View/LayoutInterno.php';
// $datos = ConsultarUsuario();
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
                    <h2>Perfil</h2>
                    <p>En progreso...</p>
                </div>
            </main>

            <?php footer(); ?>
        </div>
    </div>
    <?php ImportJS(); ?>
</body>

</html>