<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/View/LayoutInterno.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Controller/PuenteController.php';

 $puentes = array();

if (isset($_POST["btnmostrarpuentes"])) {

    $puentes =
        ListarPuentesController();
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
            <?php Navbar(); ?>
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
                        <?php if (TienePermiso([1])) { ?>
                            <div class="col-md-4">
                                <a href="/Proyecto_Grupo1/View/vFunciones/HerramientaPriorizacion.php"
                                    class="btn btn-warning w-100">Herramienta de priorización</a>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- Tabla de puentes -->
                    <div class="card">
                        <div class="card-header">Puentes registrados recientemente</div>
                        <div class="card-body position-relative">
                            <form method="post">
                                <button type="submit" id="btnmostrarpuentes" name="btnmostrarpuentes" class="btn btn-secondary float-end">
                                    <i class="bi bi-eye" aria-hidden="true"></i> Mostrar
                                </button>
                                    <div id="puentesList" class="mt-4">

                                        <?php
                                        if (
                                            isset($_POST["btnmostrarpuentes"])
                                            && empty($puentes)
                                        ) {
                                        ?>

                                            <p class="text-muted">
                                                No hay puentes registrados.
                                            </p>

                                        <?php
                                        }
                                        ?>


                                        <?php
                                        foreach ($puentes as $puente) {

                                            $inspecciones =
                                                ConsultarInspeccionesPuenteController(
                                                    $puente["codigo"]
                                                );
                                        ?>

                                            <div class="card mb-3">

                                                <div
                                                    class="card-body"
                                                    style="
                                                        display: flex;
                                                        gap: 20px;
                                                        align-items: flex-start;
                                                    "
                                                >

                                                    <div style="flex: 1;">

                                                        <p class="card-text">

                                                            <strong>Código:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["codigo"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Nombre:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["nombre"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Número de ruta:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["numero_ruta"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Clasificación de ruta:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["clasificacion_ruta"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Provincia:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["provincia"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Cantón:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["canton"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Coordenadas:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["coordenadas"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Tipo de estructura:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["tipo_estructura"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Material principal:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["material_principal"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Longitud total:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["longitud_total"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            m

                                                            <br>


                                                            <strong>Número de tramos:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["numero_tramos"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Número de superestructuras:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["numero_superestructuras"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Fecha construcción:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["fecha_construccion"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Importancia:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["importancia"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Servicios públicos:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["servicios_publicos"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <br>


                                                            <strong>Restricción de peso:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["restriccion_peso"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            t

                                                            <br>


                                                            <strong>Restricción de altura:</strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente["restriccion_altura"],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            m

                                                        </p>


                                                        <div class="mt-3">

                                                            <strong>
                                                                Inspecciones registradas:
                                                            </strong>


                                                            <div class="mt-2 d-flex flex-wrap gap-2">

                                                                <?php
                                                                if (empty($inspecciones)) {
                                                                ?>

                                                                    <span class="text-muted">

                                                                        Sin inspecciones registradas

                                                                    </span>

                                                                <?php
                                                                } else {

                                                                    foreach (
                                                                        $inspecciones
                                                                        as $inspeccion
                                                                    ) {
                                                                ?>

                                                                        <?php if (TienePermiso([1, 2])) { ?>
                                                                            <a
                                                                                href="/Proyecto_Grupo1/View/vFunciones/DetalleInspeccion.php?id=<?php
                                                                                echo
                                                                                    (int)
                                                                                    $inspeccion[
                                                                                        "ConsecutivoInspeccion"
                                                                                    ];
                                                                                ?>"
                                                                                class="btn btn-outline-primary btn-sm"
                                                                            >

                                                                            <i class="bi bi-calendar3 me-1"></i>


                                                                            <?php
                                                                            echo date(
                                                                                "d/m/Y",
                                                                                strtotime(
                                                                                    $inspeccion[
                                                                                        "FechaInspeccion"
                                                                                    ]
                                                                                )
                                                                            );
                                                                            ?>

                                                                            </a>
                                                                        <?php } ?>

                                                                <?php
                                                                    }
                                                                }
                                                                ?>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <?php
                                                    if (
                                                        !empty(
                                                            $puente["imagen"]
                                                        )
                                                    ) {
                                                    ?>

                                                        <div style="flex: 0 0 auto;">

                                                            <img
                                                                src="<?php
                                                                echo htmlspecialchars(
                                                                    $puente["imagen"],
                                                                    ENT_QUOTES,
                                                                    "UTF-8"
                                                                );
                                                                ?>"
                                                                alt="Imagen del puente"
                                                                style="
                                                                    max-width: 200px;
                                                                    max-height: 200px;
                                                                    object-fit: cover;
                                                                "
                                                            >

                                                        </div>

                                                    <?php
                                                    }
                                                    ?>

                                                </div>

                                            </div>

                                        <?php
                                        }
                                        ?>

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