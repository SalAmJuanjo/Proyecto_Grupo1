<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/View/LayoutInterno.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Controller/UsuarioController.php';


// ÚNICAMENTE ADMINISTRADORES
ValidarRol([1]);


$inspectores =
    ListarInspectoresController();


$mensajeInspector =
    $_SESSION["MensajeInspector"]
    ?? "";

$tipoMensajeInspector =
    $_SESSION["TipoMensajeInspector"]
    ?? "success";


unset(
    $_SESSION["MensajeInspector"],
    $_SESSION["TipoMensajeInspector"]
);

?>

<!DOCTYPE html>

<html lang="es">

<?php ImportCSS(); ?>

<body>

    <div class="admin-shell">

        <div class="sidebar-backdrop" data-sidebar-close>
        </div>

        <?php Sidebar(); ?>


        <div class="admin-main">

            <?php navbar(); ?>


            <main class="dashboard-content">

                <div class="container-fluid px-3 px-lg-4 py-4">


                    <div class="mb-4">

                        <h1 class="h3 mb-2">
                            Gestión de inspectores
                        </h1>

                        <p class="text-muted">
                            Consulte y administre los usuarios
                            registrados con el rol de inspector.
                        </p>

                    </div>


                    <?php if ($mensajeInspector !== ""): ?>

                        <div class="alert alert-<?=
                            htmlspecialchars(
                                $tipoMensajeInspector
                            )
                            ?>">

                            <?=
                                htmlspecialchars(
                                    $mensajeInspector
                                )
                                ?>

                        </div>

                    <?php endif; ?>


                    <div class="card">

                        <div class="card-body">


                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <div>

                                    <h5 class="mb-1">
                                        Inspectores registrados
                                    </h5>

                                    <small class="text-muted">

                                        Total:
                                        <?= count($inspectores) ?>

                                    </small>

                                </div>

                            </div>


                            <?php if (count($inspectores) === 0): ?>

                                <div class="alert alert-info">

                                    No existen inspectores
                                    registrados actualmente.

                                </div>

                            <?php else: ?>


                                <div class="table-responsive">

                                    <table class="table table-hover align-middle">

                                        <thead>

                                            <tr>

                                                <th>
                                                    #
                                                </th>

                                                <th>
                                                    Nombre
                                                </th>

                                                <th>
                                                    Correo electrónico
                                                </th>

                                                <th>
                                                    Estado
                                                </th>

                                                <th class="text-end">
                                                    Acciones
                                                </th>

                                            </tr>

                                        </thead>


                                        <tbody>

                                            <?php foreach ($inspectores as $inspector): ?>

                                                <tr>

                                                    <td>

                                                        <?=
                                                            (int) 
                                                            $inspector["Consecutivo"]
                                                            ?>

                                                    </td>


                                                    <td>

                                                        <?=
                                                            htmlspecialchars(
                                                                $inspector["Nombre"]
                                                            )
                                                            ?>

                                                    </td>


                                                    <td>

                                                        <?=
                                                            htmlspecialchars(
                                                                $inspector[
                                                                    "CorreoElectronico"
                                                                ]
                                                            )
                                                            ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        $activo =
                                                            (int) 
                                                            $inspector["Estado"]
                                                            === 1;
                                                        ?>


                                                        <?php if ($activo): ?>

                                                            <span class="badge bg-success">

                                                                Activo

                                                            </span>

                                                        <?php else: ?>

                                                            <span class="badge bg-secondary">

                                                                Inactivo

                                                            </span>

                                                        <?php endif; ?>

                                                    </td>


                                                    <td class="text-end">

                                                        <a class="btn btn-sm btn-primary" href="EditarInspector.php?id=<?=
                                                            (int) 
                                                            $inspector["Consecutivo"]
                                                            ?>">

                                                            Editar

                                                        </a>


                                                        <form action="" method="POST" class="d-inline">

                                                            <input type="hidden" name="Consecutivo" value="<?=
                                                                (int) 
                                                                $inspector[
                                                                    "Consecutivo"
                                                                ]
                                                                ?>">


                                                            <input type="hidden" name="NuevoEstado" value="<?=
                                                                $activo
                                                                ? 0
                                                                : 1
                                                                ?>">


                                                            <button type="submit" name="btnCambiarEstadoInspector" class="btn btn-sm <?=
                                                                $activo
                                                                ? "btn-outline-danger"
                                                                : "btn-outline-success"
                                                                ?>">

                                                                <?=
                                                                    $activo
                                                                    ? "Desactivar"
                                                                    : "Activar"
                                                                    ?>

                                                            </button>

                                                        </form>

                                                    </td>

                                                </tr>

                                            <?php endforeach; ?>

                                        </tbody>

                                    </table>

                                </div>

                            <?php endif; ?>

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