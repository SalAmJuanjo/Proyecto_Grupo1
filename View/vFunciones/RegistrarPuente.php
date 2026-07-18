<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/View/LayoutInterno.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Controller/PuenteController.php';
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
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="" method="post" class="needs-validation" id="formRegistrarPuente" name="formRegistrarPuente" novalidate>
                                <div class="mb-4">
                                    <h1 class="h3 mb-2">Registrar Puente</h1>
                                    <p class="text-muted mb-3">Completa los datos del puente para registrar la información en el sistema.</p>
                                </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="CodigoPuente">Código del puente</label>
                                        <input class="form-control" id="CodigoPuente" name="CodigoPuente" type="text" required>
                                        <div class="invalid-feedback">Ingresa el código del puente.</div>
                                    </div>

                                
                                    <div class="col-md-6">
                                        <label class="form-label" for="nombrePuente">Nombre del puente</label>
                                        <input class="form-control" id="nombrePuente" name="nombrePuente" type="text" required>
                                        <div class="invalid-feedback">Ingresa el nombre del puente.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="ruta">Ruta</label>
                                        <input class="form-control" id="ruta" name="ruta" type="text" required>
                                        <div class="invalid-feedback">Ingresa la ruta del puente.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="ubicacion">Ubicación</label>
                                        <input class="form-control" id="ubicacion" name="ubicacion" type="text" required>
                                        <div class="invalid-feedback">Ingresa la ubicación del puente.</div>
                                    </div>

                            

                                    <div class="col-md-6">
                                        <label class="form-label" for="longitud">Longitud (m)</label>
                                        <input class="form-control" id="longitud" name="longitud" type="text" required>
                                        <div class="invalid-feedback">Ingresa la longitud del puente.</div>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label" for="anioConstruccion">Año de construcción</label>
                                        <input class="form-control" id="anioConstruccion" name="anioConstruccion" type="text" required>
                                        <div class="invalid-feedback">Ingresa el año de construcción del puente.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="calificacion">Calificación</label>
                                        <input class="form-control" id="calificacion" name="calificacion" type="text" required>
                                        <div class="invalid-feedback">Ingresa la calificación del puente.</div>
                                    </div>
                                </div>

                                <button id="btnRegistrarPuente" name="btnRegistrarPuente" class="btn btn-primary mt-4" type="submit"><i class="bi bi-plus-circle" aria-hidden="true"></i> Registrar puente</button>
                            </form>
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