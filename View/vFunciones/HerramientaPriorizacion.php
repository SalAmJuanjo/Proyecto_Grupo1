<?php

require_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Controller/PriorizacionController.php';

ValidarAccesoPriorizacionController();

require_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/View/LayoutInterno.php';

$datosPriorizacion = ConsultarPriorizacionController();

$metodoSeleccionado = $datosPriorizacion["metodo"];
$puentes = $datosPriorizacion["puentes"];


function ObtenerClaseCondicionPriorizacion($condicion)
{
    $condicionNormalizada = strtolower(
        str_replace(
            array("í", "Í"),
            "i",
            trim($condicion)
        )
    );

    switch ($condicionNormalizada) {
        case "buena":
            return "dashboard-badge-buena";

        case "regular":
            return "dashboard-badge-regular";

        case "deficiente":
            return "dashboard-badge-deficiente";

        case "critica":
            return "dashboard-badge-critica";

        default:
            return "dashboard-badge-neutral";
    }
}

function FormatearFechaPriorizacion($fecha)
{
    if (empty($fecha)) {
        return "Sin fecha";
    }

    $marcaTiempo = strtotime($fecha);

    if (!$marcaTiempo) {
        return $fecha;
    }

    return date("d/m/Y", $marcaTiempo);
}

?>

<!DOCTYPE html>
<html lang="es">

<?php ImportCSS(); ?>

<body>

    <div class="admin-shell">

        <div
            class="sidebar-backdrop"
            data-sidebar-close>
        </div>

        <?php aside(); ?>

        <div class="admin-main">

            <?php navbar(); ?>

            <main class="dashboard-content">

                <div class="container-fluid px-3 px-lg-4 py-4">


                    <div class="page-heading mb-4">

                        <div class="page-heading-copy">

                            <div>

                                <p class="eyebrow mb-1">
                                    SmartBridge
                                </p>

                                <h1 class="h3 mb-1">
                                    Herramienta de priorización
                                </h1>

                                <p class="text-muted mb-0">
                                    Ordena los puentes según su condición
                                    estructural y nivel de importancia.
                                </p>

                            </div>

                        </div>

                    </div>


                    <section class="card mb-4">

                        <div class="card-body">

                            <form
                                method="GET"
                                action=""
                                class="row align-items-end g-3">

                                <div class="col-12 col-lg-8">

                                    <label
                                        for="metodo"
                                        class="form-label fw-semibold">

                                        Método de priorización

                                    </label>

                                    <select
                                        class="form-select"
                                        id="metodo"
                                        name="metodo">

                                        <option
                                            value="condicion"
                                            <?php
                                            echo $metodoSeleccionado === "condicion"
                                                ? "selected"
                                                : "";
                                            ?>>

                                            Condición estructural

                                        </option>

                                        <option
                                            value="condicion_importancia"
                                            <?php
                                            echo $metodoSeleccionado ===
                                                "condicion_importancia"
                                                    ? "selected"
                                                    : "";
                                            ?>>

                                            Condición estructural e importancia

                                        </option>

                                    </select>

                                <div class="form-text">
                                    <?php
                                    if ($metodoSeleccionado === "condicion_importancia") {
                                        echo "Este método combina 70 % de condición estructural y 30 % de importancia.";
                                    } else {
                                        echo "Este método ordena los puentes únicamente según su condición estructural.";
                                    }
                                    ?>
                                </div>

                                </div>

                                <div class="col-12 col-lg-4">

                                    <button
                                        type="submit"
                                        class="btn btn-primary w-100">

                                        Aplicar priorización

                                    </button>

                                </div>

                            </form>

                        </div>

                    </section>


                    <div class="row g-3 mb-4">

                        <div class="col-12 col-md-4">

                            <article class="card h-100">

                                <div class="card-body">

                                    <span class="text-muted">
                                        Puentes evaluados
                                    </span>

                                    <div class="fs-2 fw-bold mt-2">

                                        <?php echo count($puentes); ?>

                                    </div>

                                </div>

                            </article>

                        </div>

                        <div class="col-12 col-md-4">

                            <article class="card h-100">

                                <div class="card-body">

                                    <span class="text-muted">
                                        Método aplicado
                                    </span>

                                    <div class="fw-bold mt-2">

                                        <?php
                                        echo $metodoSeleccionado ===
                                            "condicion_importancia"
                                                ? "Condición e importancia"
                                                : "Condición estructural";
                                        ?>

                                    </div>

                                </div>

                            </article>

                        </div>

                        <div class="col-12 col-md-4">

                            <article class="card h-100">

                                <div class="card-body">

                                    <span class="text-muted">
                                        Mayor prioridad
                                    </span>

                                    <div class="fw-bold mt-2">

                                        <?php
                                        echo !empty($puentes)
                                            ? htmlspecialchars(
                                                $puentes[0]["nombre"],
                                                ENT_QUOTES,
                                                "UTF-8"
                                            )
                                            : "Sin resultados";
                                        ?>

                                    </div>

                                </div>

                            </article>

                        </div>

                    </div>



                    <section class="card">

                        <div class="card-body">

                            <div
                                class="d-flex flex-column flex-lg-row
                                justify-content-between gap-3 mb-3">

                                <div>

                                    <h2 class="h5 mb-1">
                                        Resultado de priorización
                                    </h2>

                                    <p class="text-muted mb-0">
                                        Los primeros registros requieren
                                        atención prioritaria.
                                    </p>

                                </div>

                                <div>

                                    <input
                                        type="search"
                                        class="form-control"
                                        placeholder="Buscar puente o ruta"
                                        aria-label="Buscar puente"
                                        data-table-search="tablaPriorizacion">

                                </div>

                            </div>

                            <?php if (empty($puentes)) { ?>

                                <div class="alert alert-info mb-0">

                                    No existen puentes con inspecciones
                                    finalizadas para realizar la priorización.

                                </div>

                            <?php } else { ?>

                                <div class="table-responsive">

                                    <table
                                        class="table table-hover align-middle"
                                        id="tablaPriorizacion">

                                        <thead>

                                            <tr>

                                                <th>Posición</th>
                                                <th>Código</th>
                                                <th>Puente</th>
                                                <th>Ruta</th>
                                                <th>Ubicación</th>
                                                <th>Inspección</th>
                                                <th>Índice</th>
                                                <th>Condición</th>

                                                <?php
                                                if (
                                                    $metodoSeleccionado ===
                                                    "condicion_importancia"
                                                ) {
                                                    ?>

                                                    <th>Importancia</th>

                                                <?php } ?>

                                                <?php
                                                if ($metodoSeleccionado === "condicion_importancia") {
                                                    ?>
                                                    <th>Puntaje</th>
                                                    <?php
                                                }
                                                ?>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php
                                            $posicion = 1;

                                            foreach ($puentes as $puente) {
                                                ?>

                                                <tr>

                                                    <td>

                                                        <span
                                                            class="badge
                                                            bg-primary">

                                                            <?php
                                                            echo $posicion;
                                                            ?>

                                                        </span>

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
                                                            $puente[
                                                                "numero_ruta"
                                                            ],
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>

                                                    </td>

                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $puente[
                                                                "provincia"
                                                            ],
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
                                                            FormatearFechaPriorizacion(
                                                                $puente[
                                                                    "fecha_inspeccion"
                                                                ]
                                                            ),
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>

                                                    </td>

                                                    <td>

                                                        <?php
                                                        echo number_format(
                                                            (float) $puente[
                                                                "indice_deterioro"
                                                            ],
                                                            2
                                                        );
                                                        ?>

                                                    </td>

                                                    <td>

                                                        <span
                                                            class="badge <?php
                                                            echo ObtenerClaseCondicionPriorizacion(
                                                                $puente[
                                                                    "condicion"
                                                                ]
                                                            );
                                                            ?>">

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $puente[
                                                                    "condicion"
                                                                ],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                        </span>

                                                    </td>

                                                    <?php
                                                    if (
                                                        $metodoSeleccionado ===
                                                        "condicion_importancia"
                                                    ) {
                                                        ?>

                                                        <td>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                ucfirst(
                                                                    $puente[
                                                                        "importancia"
                                                                    ]
                                                                ),
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                        </td>

                                                    <?php } ?>

                                                <?php
                                                if ($metodoSeleccionado === "condicion_importancia") {
                                                    ?>
                                                    <td>
                                                        <strong>
                                                            <?php
                                                            echo number_format(
                                                                (float) $puente["puntaje_prioridad"],
                                                                2
                                                            );
                                                            ?>
                                                        </strong>
                                                    </td>
                                                    <?php
                                                }
                                                ?>

                                                </tr>

                                                <?php
                                                $posicion++;
                                            }
                                            ?>

                                        </tbody>

                                    </table>

                                </div>

                            <?php } ?>

                        </div>

                    </section>

                </div>

            </main>

            <?php footer(); ?>

        </div>

    </div>

    <?php ImportJS(); ?>

</body>

</html>