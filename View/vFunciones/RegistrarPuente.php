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

        <?php Sidebar(); ?>
        <div class="admin-main">
            <?php navbar(); ?>

            <main class="dashboard-content">
                <div class="container-fluid px-3 px-lg-4 py-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="" method="post" id="formRegistrarPuente"
                                name="formRegistrarPuente" enctype="multipart/form-data">
                                <div class="mb-4">
                                    <h1 class="h3 mb-2">Registrar Puente</h1>
                                    <p class="text-muted mb-3">Completa los datos del puente para registrar la
                                        información en el sistema.</p>
                                </div>

                                <!-- Código -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="CodigoPuente">Código del puente</label>
                                    <input class="form-control" id="CodigoPuente" name="CodigoPuente" type="text">
                                </div>

                                <!-- Nombre -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="nombrePuente">Nombre del puente</label>
                                    <input class="form-control" id="nombrePuente" name="nombrePuente" type="text">
                                </div>

                                <!-- Número de ruta -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="numeroRuta">Número de ruta</label>
                                    <input class="form-control" id="numeroRuta" name="numeroRuta" type="number">
                                </div>

                                <!-- Clasificación de ruta -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="clasificacionRuta">Clasificación de ruta</label>
                                    <select class="form-control" id="clasificacionRuta" name="clasificacionRuta">
                                        <option value="">Seleccione...</option>
                                        <?php if ($clasificacionesRuta): while ($row = $clasificacionesRuta->fetch_assoc()): ?>
                                            <option value="<?= htmlspecialchars($row['nombre']) ?>">
                                                <?= htmlspecialchars(ucfirst($row['nombre'])) ?>
                                            </option>
                                        <?php endwhile; endif; ?>
                                    </select>
                                </div>

                                <!-- Provincia -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="provincia">Provincia</label>
                                    <select class="form-control" id="provincia" name="provincia">
                                        <option value="">Seleccione...</option>
                                        <?php if ($provincias): while ($row = $provincias->fetch_assoc()): ?>
                                            <option value="<?= htmlspecialchars($row['nombre']) ?>">
                                                <?= htmlspecialchars($row['nombre']) ?>
                                            </option>
                                        <?php endwhile; endif; ?>
                                    </select>
                                </div>

                                <!-- Cantón -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="canton">Cantón</label>
                                    <input class="form-control" id="canton" name="canton" type="text">
                                </div>

                                <!-- Coordenadas -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="coordenadas">Coordenadas (grados decimales)</label>
                                    <input class="form-control" id="coordenadas" name="coordenadas" type="text">
                                </div>

                                <!-- Tipo de estructura -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="tipoEstructura">Tipo de estructura</label>
                                    <select class="form-control" id="tipoEstructura" name="tipoEstructura">
                                        <option value="">Seleccione...</option>
                                        <?php if ($tiposEstructura): while ($row = $tiposEstructura->fetch_assoc()): ?>
                                            <option value="<?= htmlspecialchars($row['nombre']) ?>">
                                                <?= htmlspecialchars(ucfirst($row['nombre'])) ?>
                                            </option>
                                        <?php endwhile; endif; ?>
                                    </select>
                                </div>

                                <!-- Material principal -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="materialPrincipal">Material principal</label>
                                    <select class="form-control" id="materialPrincipal" name="materialPrincipal">
                                        <option value="">Seleccione...</option>
                                        <?php if ($materialesPrincipal): while ($row = $materialesPrincipal->fetch_assoc()): ?>
                                            <option value="<?= htmlspecialchars($row['nombre']) ?>">
                                                <?= htmlspecialchars(ucfirst($row['nombre'])) ?>
                                            </option>
                                        <?php endwhile; endif; ?>
                                    </select>
                                </div>


                                <!-- Longitud total -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="longitudTotal">Longitud total (m)</label>
                                    <input class="form-control" id="longitudTotal" name="longitudTotal" type="number"
                                        step="0.01">
                                </div>

                                <!-- Número de tramos -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="numeroTramos">Número de tramos</label>
                                    <input class="form-control" id="numeroTramos" name="numeroTramos" type="number">
                                </div>

                                <!-- Número de superestructuras -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="numeroSuperestructuras">Número de
                                        superestructuras</label>
                                    <input class="form-control" id="numeroSuperestructuras"
                                        name="numeroSuperestructuras" type="number">
                                </div>

                                <!-- Fecha de construcción -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="fechaConstruccion">Fecha de construcción</label>
                                    <input class="form-control" id="fechaConstruccion" name="fechaConstruccion"
                                        type="date">
                                </div>

                                <!-- Importancia -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="importancia">Importancia</label>
                                    <select class="form-control" id="importancia" name="importancia">
                                        <option value="">Seleccione...</option>
                                        <?php if ($importancias): while ($row = $importancias->fetch_assoc()): ?>
                                            <option value="<?= htmlspecialchars($row['nombre']) ?>">
                                                <?= htmlspecialchars(ucfirst($row['nombre'])) ?>
                                            </option>
                                        <?php endwhile; endif; ?>
                                    </select>
                                </div>

                                <!-- Servicios públicos -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="serviciosPublicos">Servicios públicos</label>
                                    <select class="form-control" id="serviciosPublicos" name="serviciosPublicos[]"
                                        multiple>
                                        <?php if ($serviciosPublicosCat): while ($row = $serviciosPublicosCat->fetch_assoc()): ?>
                                            <option value="<?= htmlspecialchars($row['nombre']) ?>">
                                                <?= htmlspecialchars(ucfirst($row['nombre'])) ?>
                                            </option>
                                        <?php endwhile; endif; ?>
                                    </select>
                                </div>
                                <!-- Restricción de Peso -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="restriccionPeso">Restricción de peso
                                        (toneladas)</label>
                                    <input class="form-control" id="restriccionPeso" name="restriccionPeso"
                                        type="number" step="0.01">
                                </div>

                                <!-- Restricción de Altura -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="restriccionAltura">Restricción de altura (m)</label>
                                    <input class="form-control" id="restriccionAltura" name="restriccionAltura"
                                        type="number" step="0.01">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="imagen">
                                        <i class="bi bi-image me-1 text-muted"></i>Imagen
                                    </label>
                                    <input class="form-control" id="imagen" name="imagen" type="file"
                                        accept=".png,image/png">
                                </div>

                                <button id="btnRegistrarPuente" name="btnRegistrarPuente" class="btn btn-primary mt-4"
                                    type="submit">
                                    <i class="bi bi-plus-circle" aria-hidden="true"></i> Registrar puente
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>

            <?php footer(); ?>
        </div>
    </div>
    <?php ImportJS(); ?>

    <script src="../../View/js/RegistrarPuente.js"></script>
</body>

</html>