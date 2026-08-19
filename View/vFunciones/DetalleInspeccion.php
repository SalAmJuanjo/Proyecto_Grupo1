<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/View/LayoutInterno.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Controller/PuenteController.php';

ValidarRol([1, 2]);

$detalles =
    ConsultarDetalleInspeccionFormularioController();


$inspeccion =
    !empty($detalles)
        ? $detalles[0]
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

            <?php Navbar(); ?>


            <main class="dashboard-content">

                <div class="container-fluid px-3 px-lg-4 py-4">


                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>

                            <h1 class="h3 mb-1">
                                Detalle de inspección
                            </h1>

                            <p class="text-muted mb-0">
                                Información general y elementos evaluados.
                            </p>

                        </div>


                        <div>

                            <a
                                href="/Proyecto_Grupo1/View/vInicio/Principal.php"
                                class="btn btn-outline-secondary"
                            >

                                Volver

                            </a>

                        </div>

                    </div>


                    <?php
                    if (empty($detalles)) {
                    ?>

                        <div class="alert alert-warning">

                            No se encontró la inspección seleccionada.

                        </div>

                    <?php
                    } else {
                    ?>


                        <div class="card mb-4">

                            <div class="card-header">

                                Información de la inspección

                            </div>


                            <div class="card-body">

                                <div class="row">


                                    <div class="col-md-6 mb-3">

                                        <strong>
                                            Código del puente:
                                        </strong>

                                        <?php
                                        echo htmlspecialchars(
                                            $inspeccion["CodigoPuente"],
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>

                                    </div>


                                    <div class="col-md-6 mb-3">

                                        <strong>
                                            Nombre del puente:
                                        </strong>

                                        <?php
                                        echo htmlspecialchars(
                                            $inspeccion["nombre"],
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>

                                    </div>


                                    <div class="col-md-4 mb-3">

                                        <strong>
                                            Ruta:
                                        </strong>

                                        <?php
                                        echo htmlspecialchars(
                                            $inspeccion["numero_ruta"],
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>

                                    </div>


                                    <div class="col-md-4 mb-3">

                                        <strong>
                                            Provincia:
                                        </strong>

                                        <?php
                                        echo htmlspecialchars(
                                            $inspeccion["provincia"],
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>

                                    </div>


                                    <div class="col-md-4 mb-3">

                                        <strong>
                                            Cantón:
                                        </strong>

                                        <?php
                                        echo htmlspecialchars(
                                            $inspeccion["canton"],
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>

                                    </div>


                                    <div class="col-md-4 mb-3">

                                        <strong>
                                            Fecha:
                                        </strong>

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

                                    </div>


                                    <div class="col-md-4 mb-3">

                                        <strong>
                                            Índice de deterioro:
                                        </strong>

                                        <?php
                                        echo number_format(
                                            (float)
                                            $inspeccion[
                                                "IndiceDeterioro"
                                            ],
                                            2
                                        );
                                        ?>

                                    </div>


                                    <div class="col-md-4 mb-3">

                                        <strong>
                                            Condición:
                                        </strong>

                                        <?php
                                        echo htmlspecialchars(
                                            $inspeccion[
                                                "CondicionPreliminar"
                                            ],
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>

                                    </div>


                                    <div class="col-md-4 mb-3">

                                        <strong>
                                            Daño acumulado:
                                        </strong>

                                        <?php
                                        echo htmlspecialchars(
                                            $inspeccion[
                                                "DanioAcumulado"
                                            ],
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>

                                    </div>


                                    <div class="col-md-4 mb-3">

                                        <strong>
                                            Elementos aplicables:
                                        </strong>

                                        <?php
                                        echo htmlspecialchars(
                                            $inspeccion[
                                                "CantidadElementosAplicables"
                                            ],
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>

                                    </div>


                                    <div class="col-12">

                                        <strong>
                                            Observación general:
                                        </strong>

                                        <div class="mt-2">

                                            <?php
                                            echo htmlspecialchars(
                                                $inspeccion[
                                                    "ObservacionGeneral"
                                                ],
                                                ENT_QUOTES,
                                                "UTF-8"
                                            );
                                            ?>

                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>


                        <div class="card">

                            <div class="card-header">

                                Elementos inspeccionados

                            </div>


                            <div class="card-body">

                                <div class="table-responsive">

                                    <table class="table table-hover align-middle">

                                        <thead>

                                            <tr>

                                                <th>
                                                    Categoría
                                                </th>

                                                <th>
                                                    Elemento
                                                </th>

                                                <th>
                                                    Aplicable
                                                </th>

                                                <th>
                                                    Calificación
                                                </th>

                                                <th>
                                                    Observación
                                                </th>

                                                <th>
                                                    Imagen
                                                </th>

                                            </tr>

                                        </thead>


                                        <tbody>


                                            <?php
                                            foreach (
                                                $detalles
                                                as $detalle
                                            ) {
                                            ?>

                                                <tr>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $detalle[
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
                                                            $detalle[
                                                                "NombreElemento"
                                                            ],
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo
                                                            $detalle[
                                                                "EsAplicable"
                                                            ]
                                                                ? "Sí"
                                                                : "No";
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        if (
                                                            $detalle[
                                                                "EsAplicable"
                                                            ]
                                                        ) {

                                                            echo htmlspecialchars(
                                                                $detalle[
                                                                    "Calificacion"
                                                                ],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );

                                                        } else {

                                                            echo "N/A";
                                                        }
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        if (
                                                            !empty(
                                                                $detalle[
                                                                    "Observacion"
                                                                ]
                                                            )
                                                        ) {

                                                            echo htmlspecialchars(
                                                                $detalle[
                                                                    "Observacion"
                                                                ],
                                                                ENT_QUOTES,
                                                                "UTF-8"
                                                            );

                                                        } else {

                                                            echo "-";
                                                        }
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        if (
                                                            !empty(
                                                                $detalle[
                                                                    "Imagen"
                                                                ]
                                                            )
                                                        ) {
                                                        ?>

                                                            <a
                                                                href="<?php
                                                                echo htmlspecialchars(
                                                                    $detalle[
                                                                        "Imagen"
                                                                    ],
                                                                    ENT_QUOTES,
                                                                    "UTF-8"
                                                                );
                                                                ?>"
                                                                target="_blank"
                                                            >

                                                                <img
                                                                    src="<?php
                                                                    echo htmlspecialchars(
                                                                        $detalle[
                                                                            "Imagen"
                                                                        ],
                                                                        ENT_QUOTES,
                                                                        "UTF-8"
                                                                    );
                                                                    ?>"
                                                                    alt="Imagen del daño"
                                                                    style="
                                                                        width: 100px;
                                                                        height: 75px;
                                                                        object-fit: cover;
                                                                    "
                                                                >

                                                            </a>

                                                        <?php
                                                        } else {

                                                            echo "-";
                                                        }
                                                        ?>

                                                    </td>


                                                </tr>


                                            <?php
                                            }
                                            ?>


                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>


                    <?php
                    }
                    ?>


                </div>

            </main>


            <?php footer(); ?>


        </div>

    </div>


    <?php ImportJS(); ?>


</body>

</html>