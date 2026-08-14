<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Controller/UsuarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/View/LayoutInterno.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
ImportCSS();
?>

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
                            <h2>Seguridad de cuenta</h2>
                            <p class="text-muted">Actualiza tu contraseña para mantener tu cuenta protegida</p>
                        </div>
                    </div>

                    <div class="row g-4 justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-md-8">
                            <?php
                            if (isset($_POST["Mensaje"])) {
                                echo '<div class="alert alert-danger text-center">'
                                    . $_POST["Mensaje"] . '</div>';
                            }
                            ?>

                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0 fw-semibold">
                                        <i class="ti ti-lock me-2"></i>Cambiar contraseña
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <form id="formCambiarContrasenna" action="" method="POST">
                                        <div class="mb-3">
                                            <label for="nuevaContrasenna" class="form-label fw-medium">
                                                <i class="ti ti-key me-1 text-muted"></i>Contraseña nueva
                                            </label>
                                            <input type="password" class="form-control" id="nuevaContrasenna" name="nuevaContrasenna" placeholder="Ingresa tu nueva contraseña" autocomplete="new-password">
                                        </div>

                                        <div class="mb-3">
                                            <label for="confirmarContrasenna" class="form-label fw-medium">
                                                <i class="ti ti-lock me-1 text-muted"></i>Confirmar contraseña
                                            </label>
                                            <input type="password" class="form-control" id="confirmarContrasenna" name="confirmarContrasenna" placeholder="Repite tu nueva contraseña" autocomplete="new-password">
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" id="btnCambiarContrasenna" name="btnCambiarContrasenna" class="btn btn-primary">
                                                <i class="ti ti-device-floppy me-2"></i>Procesar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php footer(); ?>
        </div>
    </div>
    <?php
    ImportJS();
    ?>
</body>

</html>