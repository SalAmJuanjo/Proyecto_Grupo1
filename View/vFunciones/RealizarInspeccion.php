<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/View/LayoutInterno.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Controller/InspeccionController.php';


$mensajeExito = "";
$mensajeError = "";

$codigoPuenteSeleccionado = "";
$fechaInspeccionSeleccionada = date("Y-m-d");
$observacionGeneralSeleccionada = "";
$elementosSeleccionados = array();


if (isset($resultadoInspeccion)) {

    $mensajeExito =
        isset($resultadoInspeccion["mensajeExito"])
            ? $resultadoInspeccion["mensajeExito"]
            : "";

    $mensajeError =
        isset($resultadoInspeccion["mensajeError"])
            ? $resultadoInspeccion["mensajeError"]
            : "";

    $codigoPuenteSeleccionado =
        isset($resultadoInspeccion["codigoPuente"])
            ? $resultadoInspeccion["codigoPuente"]
            : "";

    $fechaInspeccionSeleccionada =
        isset($resultadoInspeccion["fechaInspeccion"])
            ? $resultadoInspeccion["fechaInspeccion"]
            : date("Y-m-d");

    $observacionGeneralSeleccionada =
        isset($resultadoInspeccion["observacionGeneral"])
            ? $resultadoInspeccion["observacionGeneral"]
            : "";

    $elementosSeleccionados =
        isset($resultadoInspeccion["elementosSeleccionados"])
        && is_array($resultadoInspeccion["elementosSeleccionados"])
            ? $resultadoInspeccion["elementosSeleccionados"]
            : array();
}


$puentes =
    ConsultarPuentesInspeccionController();

$elementos =
    ConsultarElementosInspeccionController();

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

                    <h1 class="mb-4">
                        Realizar inspección
                    </h1>


                    <?php if ($mensajeExito != "") { ?>

                        <div class="alert alert-success">

                            <?php
                            echo htmlspecialchars(
                                $mensajeExito,
                                ENT_QUOTES,
                                "UTF-8"
                            );
                            ?>

                        </div>

                    <?php } ?>


                    <?php if ($mensajeError != "") { ?>

                        <div class="alert alert-danger">

                            <?php
                            echo htmlspecialchars(
                                $mensajeError,
                                ENT_QUOTES,
                                "UTF-8"
                            );
                            ?>

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


                        <form
                            id="formRealizarInspeccion"
                            method="POST"
                            enctype="multipart/form-data">


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


                                                <?php
                                                foreach ($puentes as $puente) {
                                                ?>

                                                    <option
                                                        value="<?php
                                                        echo htmlspecialchars(
                                                            $puente["codigo"],
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>"
                                                        <?php
                                                        echo
                                                            $codigoPuenteSeleccionado
                                                            == $puente["codigo"]
                                                                ? "selected"
                                                                : "";
                                                        ?>
                                                    >

                                                        <?php
                                                        echo htmlspecialchars(
                                                            "Ruta "
                                                            . $puente["numero_ruta"]
                                                            . " | "
                                                            . $puente["nombre"]
                                                            . " | "
                                                            . $puente["codigo"],
                                                            ENT_QUOTES,
                                                            "UTF-8"
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
                                                value="<?php
                                                echo htmlspecialchars(
                                                    $fechaInspeccionSeleccionada,
                                                    ENT_QUOTES,
                                                    "UTF-8"
                                                );
                                                ?>"
                                                required>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <fieldset
                                id="datosInspeccion"
                                <?php
                                echo
                                    $codigoPuenteSeleccionado == ""
                                        ? "disabled"
                                        : "";
                                ?>
                            >


                                <div class="card">

                                    <div class="card-body">

                                        <div class="table-responsive">

                                            <table
                                                class="table table-bordered align-middle">


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

                                                        <th>
                                                            Imagen del daño
                                                        </th>

                                                    </tr>

                                                </thead>


                                                <tbody>


                                                <?php
                                                foreach ($elementos as $elemento) {

                                                    $idElemento =
                                                        (int)
                                                        $elemento[
                                                            "ConsecutivoElemento"
                                                        ];

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
                                                                $elemento[
                                                                    "Categoria"
                                                                ],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                        </td>


                                                        <td>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $elemento[
                                                                    "NombreElemento"
                                                                ],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );
                                                            ?>

                                                            <input
                                                                type="hidden"
                                                                name="elementos[<?php
                                                                echo $idElemento;
                                                                ?>][id]"
                                                                value="<?php
                                                                echo $idElemento;
                                                                ?>">

                                                        </td>


                                                        <td>

                                                            <select
                                                                class="form-select selector-calificacion"
                                                                name="elementos[<?php
                                                                echo $idElemento;
                                                                ?>][calificacion]"
                                                                required>

                                                                <option value="">
                                                                    Seleccione
                                                                </option>

                                                                <option
                                                                    value="NA"
                                                                    <?php
                                                                    echo
                                                                        $calificacionSeleccionada
                                                                        == "NA"
                                                                            ? "selected"
                                                                            : "";
                                                                    ?>
                                                                >

                                                                    N/A

                                                                </option>


                                                                <?php
                                                                for (
                                                                    $calificacion = 1;
                                                                    $calificacion <= 5;
                                                                    $calificacion++
                                                                ) {
                                                                ?>

                                                                    <option
                                                                        value="<?php
                                                                        echo $calificacion;
                                                                        ?>"
                                                                        <?php
                                                                        echo
                                                                            (string)
                                                                            $calificacionSeleccionada
                                                                            ==
                                                                            (string)
                                                                            $calificacion
                                                                                ? "selected"
                                                                                : "";
                                                                        ?>
                                                                    >

                                                                        <?php
                                                                        echo $calificacion;
                                                                        ?>

                                                                    </option>

                                                                <?php } ?>


                                                            </select>

                                                        </td>


                                                        <td>

                                                            <input
                                                                type="text"
                                                                class="form-control observacion-elemento"
                                                                name="elementos[<?php
                                                                echo $idElemento;
                                                                ?>][observacion]"
                                                                value="<?php
                                                                echo htmlspecialchars(
                                                                    $observacionSeleccionada,
                                                                    ENT_QUOTES,
                                                                    "UTF-8"
                                                                );
                                                                ?>"
                                                                maxlength="500"
                                                                placeholder="Ingrese una observación">

                                                        </td>


                                                        <td>

                                                            <input
                                                                type="file"
                                                                class="form-control imagen-danio"
                                                                name="elementos[<?php
                                                                echo $idElemento;
                                                                ?>][imagen]"
                                                                accept=".png,image/png"
                                                                disabled>

                                                            <small class="text-muted">
                                                                Requerida para calificación 4 o 5.
                                                            </small>

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
                                                $observacionGeneralSeleccionada,
                                                ENT_QUOTES,
                                                "UTF-8"
                                            );
                                            ?></textarea>

                                    </div>

                                </div>


                                <div class="mt-4 text-end">

                                    <button
                                        type="submit"
                                        id="btnRegistrarInspeccion"
                                        name="btnRegistrarInspeccion"
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

    <script src="/Proyecto_Grupo1/View/js/realizarInspeccion.js"></script>


</body>

</html>