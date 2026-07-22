<?php

require_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Controller/DashboardController.php';

ValidarAccesoDashboardController();

require_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/View/LayoutInterno.php';

$dashboard = ConsultarDashboardController();

$resumen = $dashboard["resumen"];
$condiciones = $dashboard["condiciones"];
$rutas = $dashboard["rutas"];
$calificaciones = $dashboard["calificaciones"];
$importancias = $dashboard["importancias"];
$prioridades = $dashboard["prioridades"];
$errorDashboard = $dashboard["error"];

?>

<!DOCTYPE html>
<html lang="es">

<?php ImportCSS(); ?>

<body>

    <div class="admin-shell">

        <div class="sidebar-backdrop" data-sidebar-close>
        </div>

        <?php aside(); ?>

        <div class="admin-main">

            <?php navbar(); ?>

            <main class="dashboard-content">

                <div class="container-fluid px-3 px-lg-4 py-4">

                    <!-- Encabezado -->

                    <div class="page-heading">

                        <div class="page-heading-copy">

                            <div>

                                <p class="eyebrow mb-1">
                                    SmartBridge
                                </p>

                                <h1 class="h3 mb-1">
                                    Dashboard general
                                </h1>

                                <p class="text-muted mb-0">
                                    Resumen del estado de los puentes,
                                    inspecciones y niveles de deterioro.
                                </p>

                            </div>

                        </div>

                        <div class="dashboard-update">

                            <span>
                                Última actualización
                            </span>

                            <strong>
                                <?php echo date("d/m/Y H:i"); ?>
                            </strong>

                        </div>

                    </div>

                    <!-- Mensaje de error -->

                    <?php if ($errorDashboard !== "") { ?>

                        <div class="alert alert-danger" role="alert">

                            <?php
                            echo htmlspecialchars(
                                $errorDashboard,
                                ENT_QUOTES,
                                "UTF-8"
                            );
                            ?>

                        </div>

                    <?php } ?>

                    <!-- Mensaje cuando no hay inspecciones -->

                    <?php if ($resumen["totalInspecciones"] === 0) { ?>

                        <div class="alert alert-info" role="alert">

                            Todavía no hay inspecciones registradas.
                            Los gráficos se actualizarán automáticamente
                            cuando se registren nuevas inspecciones.

                        </div>

                    <?php } ?>

                    <!-- Tarjetas de indicadores -->

                    <div class="row g-3 mb-4">

                        <!-- Total de puentes -->

                        <div class="col-12 col-sm-6 col-xl-3">

                            <article class="metric-card metric-primary h-100">

                                <div class="metric-top">

                                    <span class="metric-label">
                                        Total de puentes
                                    </span>

                                    <span class="metric-icon" aria-hidden="true">

                                        P

                                    </span>

                                </div>

                                <div class="metric-value">

                                    <?php
                                    echo $resumen["totalPuentes"];
                                    ?>

                                </div>

                                <div class="metric-meta">
                                    Puentes registrados
                                </div>

                            </article>

                        </div>

                        <!-- Total de inspecciones -->

                        <div class="col-12 col-sm-6 col-xl-3">

                            <article class="metric-card metric-success h-100">

                                <div class="metric-top">

                                    <span class="metric-label">
                                        Inspecciones
                                    </span>

                                    <span class="metric-icon" aria-hidden="true">

                                        I

                                    </span>

                                </div>

                                <div class="metric-value">

                                    <?php
                                    echo $resumen["totalInspecciones"];
                                    ?>

                                </div>

                                <div class="metric-meta">
                                    Inspecciones realizadas
                                </div>

                            </article>

                        </div>

                        <!-- Puentes críticos -->

                        <div class="col-12 col-sm-6 col-xl-3">

                            <article class="metric-card metric-danger h-100">

                                <div class="metric-top">

                                    <span class="metric-label">
                                        Puentes críticos
                                    </span>

                                    <span class="metric-icon" aria-hidden="true">

                                        C

                                    </span>

                                </div>

                                <div class="metric-value">

                                    <?php
                                    echo $resumen["puentesCriticos"];
                                    ?>

                                </div>

                                <div class="metric-meta">
                                    Según su última inspección
                                </div>

                            </article>

                        </div>

                        <!-- Rutas afectadas -->

                        <div class="col-12 col-sm-6 col-xl-3">

                            <article class="metric-card metric-warning h-100">

                                <div class="metric-top">

                                    <span class="metric-label">
                                        Rutas afectadas
                                    </span>

                                    <span class="metric-icon" aria-hidden="true">

                                        R

                                    </span>

                                </div>

                                <div class="metric-value">

                                    <?php
                                    echo $resumen["rutasAfectadas"];
                                    ?>

                                </div>

                                <div class="metric-meta">
                                    Con condición deficiente o crítica
                                </div>

                            </article>

                        </div>

                    </div>

                    <!-- Primera fila de gráficos -->

                    <div class="row g-4 mb-4">

                        <!-- Condición de los puentes -->

                        <div class="col-12 col-xl-5">

                            <section class="panel h-100">

                                <div class="panel-header">

                                    <div>

                                        <h2 class="h5 mb-1">
                                            Condición de los puentes
                                        </h2>

                                        <p class="text-muted mb-0">
                                            Última inspección registrada
                                            por cada puente.
                                        </p>

                                    </div>

                                </div>

                                <div class="dashboard-chart-container" id="contenedorCondiciones">

                                    <canvas id="graficoCondiciones" aria-label="
                            Distribución de los puentes
                            por condición
                        ">
                                    </canvas>

                                </div>

                            </section>

                        </div>

                        <!-- Rutas afectadas -->

                        <div class="col-12 col-xl-7">

                            <section class="panel h-100">

                                <div class="panel-header">

                                    <div>

                                        <h2 class="h5 mb-1">
                                            Rutas con más afectaciones
                                        </h2>

                                        <p class="text-muted mb-0">
                                            Puentes con condición
                                            deficiente o crítica.
                                        </p>

                                    </div>

                                </div>

                                <div class="dashboard-chart-container" id="contenedorRutas">

                                    <canvas id="graficoRutas" aria-label="
                            Rutas con más puentes afectados
                        ">
                                    </canvas>

                                </div>

                            </section>

                        </div>

                    </div>

                    <!-- Segunda fila de gráficos -->

                    <div class="row g-4 mb-4">

                        <!-- Calificaciones -->

                        <div class="col-12 col-xl-7">

                            <section class="panel h-100">

                                <div class="panel-header">

                                    <div>

                                        <h2 class="h5 mb-1">
                                            Distribución de calificaciones
                                        </h2>

                                        <p class="text-muted mb-0">
                                            Notas asignadas a los
                                            elementos inspeccionados.
                                        </p>

                                    </div>

                                </div>

                                <div class="dashboard-chart-container" id="contenedorCalificaciones">

                                    <canvas id="graficoCalificaciones" aria-label="
                            Distribución de calificaciones
                        ">
                                    </canvas>

                                </div>

                            </section>

                        </div>

                        <!-- Importancia -->

                        <div class="col-12 col-xl-5">

                            <section class="panel h-100">

                                <div class="panel-header">

                                    <div>

                                        <h2 class="h5 mb-1">
                                            Puentes por importancia
                                        </h2>

                                        <p class="text-muted mb-0">
                                            Clasificación asignada
                                            al registrar cada puente.
                                        </p>

                                    </div>

                                </div>

                                <div class="dashboard-chart-container" id="contenedorImportancias">

                                    <canvas id="graficoImportancias" aria-label="
                            Puentes clasificados
                            por importancia
                        ">
                                    </canvas>

                                </div>

                            </section>

                        </div>

                    </div>

                    <!-- Tabla de puentes prioritarios -->

                    <section class="panel">

                        <div class="dashboard-table-heading mb-3">

                            <div>

                                <h2 class="h5 mb-1">
                                    Puentes prioritarios
                                </h2>

                                <p class="text-muted mb-0">
                                    Ordenados del mayor al menor
                                    índice de deterioro.
                                </p>

                            </div>

                            <div class="dashboard-table-actions">

                                <input type="search" class="form-control table-search"
                                    placeholder="Buscar puente o ruta" aria-label="
                        Buscar en la tabla de prioridades
                    " data-table-search="tablaPrioridades">

                                <button type="button" class="btn btn-outline-primary" id="btnExportarPrioridades">

                                    Exportar CSV

                                </button>

                            </div>

                        </div>

                        <?php if (empty($prioridades)) { ?>

                            <div class="dashboard-empty">

                                <strong>
                                    No hay datos disponibles
                                </strong>

                                <span>
                                    Registre inspecciones para mostrar
                                    los puentes prioritarios.
                                </span>

                            </div>

                        <?php } else { ?>

                            <div class="table-responsive">

                                <table class="table table-hover align-middle" id="tablaPrioridades">

                                    <thead>

                                        <tr>

                                            <th>
                                                Posición
                                            </th>

                                            <th>
                                                Código
                                            </th>

                                            <th>
                                                Puente
                                            </th>

                                            <th>
                                                Ruta
                                            </th>

                                            <th>
                                                Ubicación
                                            </th>

                                            <th>
                                                Inspección
                                            </th>

                                            <th>
                                                Índice
                                            </th>

                                            <th>
                                                Condición
                                            </th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php
                                        $posicion = 1;

                                        foreach (
                                            $prioridades as $puente
                                        ) {
                                            ?>

                                            <tr>

                                                <td>

                                                    <strong>
                                                        <?php echo $posicion; ?>
                                                    </strong>

                                                </td>

                                                <td>

                                                    <?php
                                                    echo htmlspecialchars(
                                                        $puente["codigo"],
                                                        ENT_QUOTES,
                                                        "UTF-8"
                                                    );
                                                    ?>

                                                </td>

                                                <td>

                                                    <strong>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $puente["nombre"],
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>

                                                    </strong>

                                                </td>

                                                <td>

                                                    Ruta

                                                    <?php
                                                    echo htmlspecialchars(
                                                        $puente["numero_ruta"],
                                                        ENT_QUOTES,
                                                        "UTF-8"
                                                    );
                                                    ?>

                                                </td>

                                                <td>

                                                    <?php
                                                    echo htmlspecialchars(
                                                        $puente["provincia"],
                                                        ENT_QUOTES,
                                                        "UTF-8"
                                                    );
                                                    ?>,

                                                    <?php
                                                    echo htmlspecialchars(
                                                        $puente["canton"],
                                                        ENT_QUOTES,
                                                        "UTF-8"
                                                    );
                                                    ?>

                                                </td>

                                                <td>

                                                    <?php
                                                    echo htmlspecialchars(
                                                        $puente["FechaFormateada"],
                                                        ENT_QUOTES,
                                                        "UTF-8"
                                                    );
                                                    ?>

                                                </td>

                                                <td>

                                                    <strong>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $puente["IndiceFormateado"],
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>

                                                    </strong>

                                                </td>

                                                <td>

                                                    <span class="
                                            dashboard-badge
                                            <?php
                                            echo htmlspecialchars(
                                                $puente[
                                                    "ClaseCondicion"
                                                ],
                                                ENT_QUOTES,
                                                "UTF-8"
                                            );
                                            ?>
                                        ">

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $puente[
                                                                "CondicionPreliminar"
                                                            ],
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>

                                                    </span>

                                                </td>

                                            </tr>

                                            <?php
                                            $posicion++;
                                        }
                                        ?>

                                    </tbody>

                                </table>

                            </div>

                        <?php } ?>

                    </section>

                </div>

            </main>

            <?php footer(); ?>

        </div>

    </div>

    <?php ImportJS(); ?>

    <script>
        window.smartBridgeDashboard =
            <?php
            echo json_encode(
                array(
                    "condiciones" => $condiciones,
                    "rutas" => $rutas,
                    "calificaciones" => $calificaciones,
                    "importancias" => $importancias
                ),
                JSON_UNESCAPED_UNICODE
                | JSON_NUMERIC_CHECK
                | JSON_HEX_TAG
                | JSON_HEX_AMP
                | JSON_HEX_APOS
                | JSON_HEX_QUOT
            );
            ?>;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="../js/dashboard.js"></script>

</body>

</html>