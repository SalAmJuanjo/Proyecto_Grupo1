<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/View/LayoutInterno.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Controller/InspeccionController.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/View/LayoutInterno.php';

$mensajeExito = "";
$mensajeError = "";

$codigoPuenteSeleccionado = "";
$fechaInspeccionSeleccionada = date("Y-m-d");
$observacionGeneralSeleccionada = "";
$elementosSeleccionados = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $codigoPuenteSeleccionado =
        isset($_POST["codigoPuente"])
            ? trim($_POST["codigoPuente"])
            : "";

    $fechaInspeccionSeleccionada =
        isset($_POST["fechaInspeccion"])
            ? trim($_POST["fechaInspeccion"])
            : "";

    $observacionGeneralSeleccionada =
        isset($_POST["observacionGeneral"])
            ? trim($_POST["observacionGeneral"])
            : "";

    $elementosSeleccionados =
        isset($_POST["elementos"]) && is_array($_POST["elementos"])
            ? $_POST["elementos"]
            : array();

    $consecutivoInspector =
        isset($_SESSION["ConsecutivoUsuario"])
            ? (int) $_SESSION["ConsecutivoUsuario"]
            : 0;

    if ($consecutivoInspector <= 0) {
        $mensajeError = "No fue posible identificar al inspector.";
    } elseif ($codigoPuenteSeleccionado === "") {
        $mensajeError = "Debe seleccionar un puente.";
    } elseif ($fechaInspeccionSeleccionada === "") {
        $mensajeError = "Debe indicar la fecha de inspección.";
    } elseif (empty($elementosSeleccionados)) {
        $mensajeError = "No se recibieron los elementos de la inspección.";
    } else {
        $detallesValidos = array();
        $cantidadAplicables = 0;

        foreach ($elementosSeleccionados as $detalle) {
            $consecutivoElemento =
                isset($detalle["id"])
                    ? (int) $detalle["id"]
                    : 0;

            $valorCalificacion =
                isset($detalle["calificacion"])
                    ? trim($detalle["calificacion"])
                    : "";

            $observacion =
                isset($detalle["observacion"])
                    ? trim($detalle["observacion"])
                    : "";

            if ($consecutivoElemento <= 0) {
                $mensajeError = "Se encontró un elemento no válido.";
                break;
            }

            if ($valorCalificacion === "") {
                $mensajeError =
                    "Debe seleccionar una calificación o N/A para todos los elementos.";
                break;
            }

            if ($valorCalificacion === "NA") {
                $esAplicable = 0;
                $calificacion = null;
            } elseif (
                is_numeric($valorCalificacion) &&
                (int) $valorCalificacion >= 1 &&
                (int) $valorCalificacion <= 5
            ) {
                $esAplicable = 1;
                $calificacion = (int) $valorCalificacion;
                $cantidadAplicables++;

                if ($calificacion > 1 && $observacion === "") {
                    $mensajeError =
                        "Debe ingresar una observación para todos los elementos con calificación mayor a 1.";
                    break;
                }
            } else {
                $mensajeError = "Se encontró una calificación no válida.";
                break;
            }

            $detallesValidos[] = array(
                "consecutivoElemento" => $consecutivoElemento,
                "esAplicable" => $esAplicable,
                "calificacion" => $calificacion,
                "observacion" => $observacion
            );
        }

        if ($mensajeError === "" && $cantidadAplicables === 0) {
            $mensajeError =
                "La inspección debe tener al menos un elemento aplicable.";
        }

        if ($mensajeError === "") {
            $consecutivoInspeccion = RegistrarInspeccionController(
                $codigoPuenteSeleccionado,
                $consecutivoInspector,
                $fechaInspeccionSeleccionada,
                $observacionGeneralSeleccionada
            );

            if ($consecutivoInspeccion <= 0) {
                $mensajeError =
                    "No fue posible registrar el encabezado de la inspección.";
            } else {
                $detallesGuardados = true;

                foreach ($detallesValidos as $detalleValido) {
                    $resultadoDetalle =
                        RegistrarDetalleInspeccionController(
                            $consecutivoInspeccion,
                            $detalleValido["consecutivoElemento"],
                            $detalleValido["esAplicable"],
                            $detalleValido["calificacion"],
                            $detalleValido["observacion"]
                        );

                    if (!$resultadoDetalle) {
                        $detallesGuardados = false;
                        break;
                    }
                }

                if (!$detallesGuardados) {
                    $mensajeError =
                        "La inspección fue creada, pero no fue posible guardar todos sus elementos.";
                } else {
                    $resultadoFinal =
                        FinalizarInspeccionController(
                            $consecutivoInspeccion
                        );

                    if (empty($resultadoFinal)) {
                        $mensajeError =
                            "Los elementos fueron guardados, pero no fue posible finalizar la inspección.";
                    } else {
                        $mensajeExito =
                            "La inspección se registró correctamente. "
                            . "Daño acumulado: "
                            . $resultadoFinal["DanioAcumulado"]
                            . ". Índice de deterioro: "
                            . $resultadoFinal["IndiceDeterioro"]
                            . ". Condición preliminar: "
                            . $resultadoFinal["CondicionPreliminar"]
                            . ".";

                        $codigoPuenteSeleccionado = "";
                        $fechaInspeccionSeleccionada = date("Y-m-d");
                        $observacionGeneralSeleccionada = "";
                        $elementosSeleccionados = array();
                    }
                }
            }
        }
    }
}

$puentes = ConsultarPuentesInspeccionController();
$elementos = ConsultarElementosInspeccionController();

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

                    <h1 class="mb-4">
                        Realizar inspección
                    </h1>

                    <?php if ($mensajeExito !== "") { ?>

                        <div class="alert alert-success">
                            <?php echo htmlspecialchars($mensajeExito); ?>
                        </div>

                    <?php } ?>

                    <?php if ($mensajeError !== "") { ?>

                        <div class="alert alert-danger">
                            <?php echo htmlspecialchars($mensajeError); ?>
                        </div>

                    <?php } ?>

                    <?php if (empty($puentes)) { ?>

                        <div class="alert alert-warning">
                            No hay puentes registrados para realizar una inspección.
                        </div>

                    <?php } elseif (empty($elementos)) { ?>

                        <div class="alert alert-warning">
                            No se encontraron elementos activos para realizar la inspección.
                        </div>

                    <?php } else { ?>

                        <form method="POST">

                            <div class="card mb-4">

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-8 mb-3">

                                            <label
                                                for="codigoPuente"
                                                class="form-label">

                                                Puente a inspeccionar

                                            </label>

                                            <select
                                                class="form-select"
                                                id="codigoPuente"
                                                name="codigoPuente"
                                                required>

                                                <option value="">
                                                    Seleccione un puente
                                                </option>

                                                <?php foreach ($puentes as $puente) { ?>

                                                    <option
                                                        value="<?php echo htmlspecialchars($puente["codigo"]); ?>"
                                                        <?php
                                                        echo $codigoPuenteSeleccionado === $puente["codigo"]
                                                            ? "selected"
                                                            : "";
                                                        ?>>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            "Ruta "
                                                            . $puente["ruta"]
                                                            . " | km "
                                                            . $puente["ubicacion"]
                                                            . " | "
                                                            . $puente["nombre"]
                                                            . " | "
                                                            . $puente["codigo"]
                                                        );
                                                        ?>

                                                    </option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="col-md-4 mb-3">

                                            <label
                                                for="fechaInspeccion"
                                                class="form-label">

                                                Fecha de inspección

                                            </label>

                                            <input
                                                type="date"
                                                class="form-control"
                                                id="fechaInspeccion"
                                                name="fechaInspeccion"
                                                value="<?php echo htmlspecialchars($fechaInspeccionSeleccionada); ?>"
                                                required>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <fieldset
                                id="datosInspeccion"
                                <?php
                                echo $codigoPuenteSeleccionado === ""
                                    ? "disabled"
                                    : "";
                                ?>>

                                <div class="card">

                                    <div class="card-body">

                                        <div class="table-responsive">

                                            <table class="table table-bordered align-middle">

                                                <thead>

                                                    <tr>

                                                        <th>
                                                            Categoría
                                                        </th>

                                                        <th>
                                                            Elemento
                                                        </th>

                                                        <th>
                                                            Calificación
                                                        </th>

                                                        <th>
                                                            Observación
                                                        </th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php foreach ($elementos as $elemento) { ?>

                                                        <?php
                                                        $idElemento =
                                                            (int) $elemento["ConsecutivoElemento"];

                                                        $calificacionSeleccionada = "";

                                                        $observacionSeleccionada = "";

                                                        if (
                                                            isset(
                                                                $elementosSeleccionados[
                                                                    $idElemento
                                                                ]
                                                            )
                                                        ) {
                                                            $calificacionSeleccionada =
                                                                isset(
                                                                    $elementosSeleccionados[
                                                                        $idElemento
                                                                    ]["calificacion"]
                                                                )
                                                                    ? $elementosSeleccionados[
                                                                        $idElemento
                                                                    ]["calificacion"]
                                                                    : "";

                                                            $observacionSeleccionada =
                                                                isset(
                                                                    $elementosSeleccionados[
                                                                        $idElemento
                                                                    ]["observacion"]
                                                                )
                                                                    ? $elementosSeleccionados[
                                                                        $idElemento
                                                                    ]["observacion"]
                                                                    : "";
                                                        }
                                                        ?>

                                                        <tr>

                                                            <td>

                                                                <?php
                                                                echo htmlspecialchars(
                                                                    $elemento["Categoria"]
                                                                );
                                                                ?>

                                                            </td>

                                                            <td>

                                                                <?php
                                                                echo htmlspecialchars(
                                                                    $elemento["NombreElemento"]
                                                                );
                                                                ?>

                                                                <input
                                                                    type="hidden"
                                                                    name="elementos[<?php echo $idElemento; ?>][id]"
                                                                    value="<?php echo $idElemento; ?>">

                                                            </td>

                                                            <td>

                                                                <select
                                                                    class="form-select selector-calificacion"
                                                                    name="elementos[<?php echo $idElemento; ?>][calificacion]"
                                                                    required>

                                                                    <option value="">
                                                                        Seleccione
                                                                    </option>

                                                                    <option
                                                                        value="NA"
                                                                        <?php
                                                                        echo $calificacionSeleccionada === "NA"
                                                                            ? "selected"
                                                                            : "";
                                                                        ?>>

                                                                        N/A

                                                                    </option>

                                                                    <?php for ($calificacion = 1; $calificacion <= 5; $calificacion++) { ?>

                                                                        <option
                                                                            value="<?php echo $calificacion; ?>"
                                                                            <?php
                                                                            echo (string) $calificacionSeleccionada ===
                                                                                (string) $calificacion
                                                                                    ? "selected"
                                                                                    : "";
                                                                            ?>>

                                                                            <?php echo $calificacion; ?>

                                                                        </option>

                                                                    <?php } ?>

                                                                </select>

                                                            </td>

                                                            <td>

                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    name="elementos[<?php echo $idElemento; ?>][observacion]"
                                                                    value="<?php echo htmlspecialchars($observacionSeleccionada); ?>"
                                                                    maxlength="500"
                                                                    placeholder="Ingrese una observación">

                                                            </td>

                                                        </tr>

                                                    <?php } ?>

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                                <div class="card mt-4">

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-3 mb-3">

                                                <label
                                                    for="danioAcumulado"
                                                    class="form-label">

                                                    Daño acumulado

                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="danioAcumulado"
                                                    value="0"
                                                    readonly>

                                            </div>

                                            <div class="col-md-3 mb-3">

                                                <label
                                                    for="cantidadElementos"
                                                    class="form-label">

                                                    Elementos aplicables

                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="cantidadElementos"
                                                    value="0"
                                                    readonly>

                                            </div>

                                            <div class="col-md-3 mb-3">

                                                <label
                                                    for="indiceDeterioro"
                                                    class="form-label">

                                                    Índice de deterioro

                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="indiceDeterioro"
                                                    value="0.00"
                                                    readonly>

                                            </div>

                                            <div class="col-md-3 mb-3">

                                                <label
                                                    for="condicionPreliminar"
                                                    class="form-label">

                                                    Condición preliminar

                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="condicionPreliminar"
                                                    value="Sin clasificar"
                                                    readonly>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="card mt-4">

                                    <div class="card-body">

                                        <label
                                            for="observacionGeneral"
                                            class="form-label">

                                            Observación general

                                        </label>

                                        <textarea
                                            class="form-control"
                                            id="observacionGeneral"
                                            name="observacionGeneral"
                                            rows="4"
                                            maxlength="1000"
                                            placeholder="Ingrese una observación general de la inspección"><?php
                                            echo htmlspecialchars(
                                                $observacionGeneralSeleccionada
                                            );
                                            ?></textarea>

                                    </div>

                                </div>

                                <div class="mt-4 text-end">

                                    <button
                                        type="submit"
                                        class="btn btn-primary">

                                        Guardar inspección

                                    </button>

                                </div>

                            </fieldset>

                        </form>

                    <?php } ?>

                </div>

            </main>

            <?php footer(); ?>

        </div>

    </div>

    <?php ImportJS(); ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const codigoPuente =
                document.getElementById("codigoPuente");

            const datosInspeccion =
                document.getElementById("datosInspeccion");

            const danioAcumulado =
                document.getElementById("danioAcumulado");

            const cantidadElementos =
                document.getElementById("cantidadElementos");

            const indiceDeterioro =
                document.getElementById("indiceDeterioro");

            const condicionPreliminar =
                document.getElementById("condicionPreliminar");

            const calificaciones =
                document.querySelectorAll(".selector-calificacion");

            function calcularCondicion(indice) {
                if (indice >= 1 && indice < 2) {
                    return "Buena";
                }

                if (indice >= 2 && indice < 3) {
                    return "Regular";
                }

                if (indice >= 3 && indice < 4) {
                    return "Deficiente";
                }

                if (indice >= 4 && indice <= 5) {
                    return "Crítica";
                }

                return "Sin clasificar";
            }

            function actualizarResultados() {
                let totalDanio = 0;
                let totalElementos = 0;

                calificaciones.forEach(function (selector) {
                    const valor = selector.value;

                    if (valor !== "" && valor !== "NA") {
                        totalDanio += Number(valor);
                        totalElementos++;
                    }
                });

                let indice = 0;

                if (totalElementos > 0) {
                    indice = totalDanio / totalElementos;
                }

                if (danioAcumulado) {
                    danioAcumulado.value = totalDanio;
                }

                if (cantidadElementos) {
                    cantidadElementos.value = totalElementos;
                }

                if (indiceDeterioro) {
                    indiceDeterioro.value = indice.toFixed(2);
                }

                if (condicionPreliminar) {
                    condicionPreliminar.value =
                        calcularCondicion(indice);
                }
            }

            if (codigoPuente && datosInspeccion) {
                codigoPuente.addEventListener(
                    "change",
                    function () {
                        datosInspeccion.disabled =
                            this.value === "";
                    }
                );
            }

            calificaciones.forEach(function (selector) {
                selector.addEventListener(
                    "change",
                    actualizarResultados
                );
            });

            actualizarResultados();
        });
    </script>

</body>

</html>