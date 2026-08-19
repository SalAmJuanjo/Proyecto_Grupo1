<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/View/LayoutInterno.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Controller/PriorizacionController.php';


ValidarRol([1]);


$datosPriorizacion =
    ConsultarPriorizacionController();


$metodoSeleccionado =
    isset($datosPriorizacion["metodo"])
        ? $datosPriorizacion["metodo"]
        : "condicion";


$puentes =
    isset($datosPriorizacion["puentes"])
    && is_array($datosPriorizacion["puentes"])
        ? $datosPriorizacion["puentes"]
        : array();

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


        <?php Sidebar(); ?>


        <div class="admin-main">

            <?php navbar(); ?>


            <main class="dashboard-content">

                <div class="container-fluid px-3 px-lg-4 py-4">


                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>

                            <h1 class="h3 mb-1">
                                Priorización de puentes
                            </h1>

                            <p class="text-muted mb-0">
                                Orden de atención de los puentes según el método seleccionado.
                            </p>

                        </div>

                    </div>


                    <div class="card mb-4">

                        <div class="card-body">

                            <form
                                action=""
                                method="GET">

                                <div class="row align-items-end">


                                    <div class="col-md-6">

                                        <label
                                            for="metodo"
                                            class="form-label">

                                            Método de priorización

                                        </label>


                                        <select
                                            class="form-select"
                                            id="metodo"
                                            name="metodo">


                                            <option
                                                value="condicion"
                                                <?php
                                                echo
                                                    $metodoSeleccionado == "condicion"
                                                        ? "selected"
                                                        : "";
                                                ?>
                                            >

                                                Condición estructural

                                            </option>


                                            <option
                                                value="condicion_importancia"
                                                <?php
                                                echo
                                                    $metodoSeleccionado == "condicion_importancia"
                                                        ? "selected"
                                                        : "";
                                                ?>
                                            >

                                                Condición estructural e importancia

                                            </option>


                                        </select>

                                    </div>


                                    <div class="col-md-3 mt-3 mt-md-0">

                                        <button
                                            type="submit"
                                            id="btnAplicarPriorizacion"
                                            name="btnAplicarPriorizacion"
                                            class="btn btn-primary w-100">

                                            Aplicar método

                                        </button>

                                    </div>


                                </div>

                            </form>


                            <div class="mt-3">

                                <?php
                                if (
                                    $metodoSeleccionado
                                    == "condicion_importancia"
                                ) {
                                ?>

                                    <div class="alert alert-info mb-0">

                                        Este método combina
                                        50 % de condición estructural
                                        y 50 % de importancia.
                                        El puntaje de prioridad representa
                                        el resultado combinado utilizado
                                        para ordenar los puentes.

                                    </div>

                                <?php
                                } else {
                                ?>

                                    <div class="alert alert-info mb-0">

                                        Este método prioriza los puentes
                                        según su condición estructural.

                                    </div>

                                <?php
                                }
                                ?>

                            </div>

                        </div>

                    </div>


                    <div class="card">

                        <div class="card-header">

                            <h5 class="mb-0">
                                Resultado de priorización
                            </h5>

                        </div>


                        <div class="card-body">


                            <?php
                            if (empty($puentes)) {
                            ?>

                                <div class="alert alert-warning mb-0">

                                    No se encontraron puentes con inspecciones
                                    registradas para realizar la priorización.

                                </div>

                            <?php
                            } else {
                            ?>


                                <div class="table-responsive">


                                    <table class="table table-hover align-middle">


                                        <thead>

                                            <tr>


                                                <th>
                                                    Prioridad
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
                                                    Fecha de inspección
                                                </th>


                                                <th>
                                                    Índice de deterioro
                                                </th>


                                                <th>
                                                    Condición
                                                </th>


                                                <?php
                                                if (
                                                    $metodoSeleccionado
                                                    == "condicion_importancia"
                                                ) {
                                                ?>

                                                    <th>
                                                        Importancia
                                                    </th>


                                                    <th>
                                                        Puntaje de prioridad
                                                    </th>

                                                <?php
                                                }
                                                ?>


                                            </tr>

                                        </thead>


                                        <tbody>


                                            <?php

                                            $posicion = 1;


                                            foreach ($puentes as $puente) {


                                                $codigo =
                                                    isset($puente["codigo"])
                                                        ? $puente["codigo"]
                                                        : "";


                                                $nombre =
                                                    isset($puente["nombre"])
                                                        ? $puente["nombre"]
                                                        : "";


                                                $numeroRuta =
                                                    isset($puente["numero_ruta"])
                                                        ? $puente["numero_ruta"]
                                                        : "";


                                                $provincia =
                                                    isset($puente["provincia"])
                                                        ? $puente["provincia"]
                                                        : "";


                                                $canton =
                                                    isset($puente["canton"])
                                                        ? $puente["canton"]
                                                        : "";


                                                $fechaInspeccion =
                                                    isset($puente["fecha_inspeccion"])
                                                        ? $puente["fecha_inspeccion"]
                                                        : "";


                                                $indiceDeterioro =
                                                    isset($puente["indice_deterioro"])
                                                        ? (float) $puente["indice_deterioro"]
                                                        : 0;


                                                $condicion =
                                                    isset($puente["condicion"])
                                                    && trim($puente["condicion"]) != ""
                                                        ? $puente["condicion"]
                                                        : "Sin clasificar";


                                                $importancia =
                                                    isset($puente["importancia"])
                                                        ? $puente["importancia"]
                                                        : "";


                                                $puntajePrioridad =
                                                    isset($puente["puntaje_prioridad"])
                                                        ? (float) $puente["puntaje_prioridad"]
                                                        : 0;


                                                $claseCondicion =
                                                    ObtenerClaseCondicionPriorizacionController(
                                                        $condicion
                                                    );


                                                $fechaFormateada =
                                                    FormatearFechaPriorizacionController(
                                                        $fechaInspeccion
                                                    );

                                            ?>


                                                <tr>


                                                    <td>

                                                        <strong>
                                                            <?php
                                                            echo $posicion;
                                                            ?>
                                                        </strong>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $codigo,
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $nombre,
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $numeroRuta,
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $provincia
                                                            . ", "
                                                            . $canton,
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $fechaFormateada,
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo number_format(
                                                            $indiceDeterioro,
                                                            2
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <span
                                                            class="badge <?php
                                                            echo htmlspecialchars(
                                                                $claseCondicion,
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>"
                                                        >

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $condicion,
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                        </span>

                                                    </td>


                                                    <?php
                                                    if (
                                                        $metodoSeleccionado
                                                        == "condicion_importancia"
                                                    ) {
                                                    ?>


                                                        <td>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $importancia,
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                        </td>


                                                        <td>

                                                            <strong>

                                                                <?php
                                                                echo number_format(
                                                                    $puntajePrioridad,
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


                            <?php
                            }
                            ?>


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