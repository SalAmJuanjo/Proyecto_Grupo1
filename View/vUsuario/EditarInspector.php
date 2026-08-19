<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/View/LayoutInterno.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Controller/UsuarioController.php';


ValidarRol([1]);


$consecutivo =
    isset($_GET["id"])
    ? (int) $_GET["id"]
    : 0;


$inspector =
    ConsultarInspectorController(
        $consecutivo
    );


if (!$inspector) {

    http_response_code(404);

    exit(
        "El inspector indicado no existe."
    );
}

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

                        <a href="GestionInspectores.php" class="btn btn-outline-secondary btn-sm mb-3">

                            ← Volver

                        </a>


                        <h1 class="h3 mb-2">
                            Editar inspector
                        </h1>

                        <p class="text-muted">

                            Modifique la información
                            del usuario seleccionado.

                        </p>

                    </div>


                    <div class="card">

                        <div class="card-body">


                            <form action="GestionInspectores.php" method="POST">


                                <input type="hidden" name="Consecutivo" value="<?=
                                    (int) 
                                    $inspector["Consecutivo"]
                                    ?>">


                                <div class="row">


                                    <div class="col-md-6 mb-3">

                                        <label for="Nombre" class="form-label">

                                            Nombre completo

                                        </label>


                                        <input type="text" class="form-control" id="Nombre" name="Nombre" required
                                            value="<?=
                                                htmlspecialchars(
                                                    $inspector["Nombre"]
                                                )
                                                ?>">

                                    </div>


                                    <div class="col-md-6 mb-3">

                                        <label for="CorreoElectronico" class="form-label">

                                            Correo electrónico

                                        </label>


                                        <input type="email" class="form-control" id="CorreoElectronico"
                                            name="CorreoElectronico" required value="<?=
                                                htmlspecialchars(
                                                    $inspector[
                                                        "CorreoElectronico"
                                                    ]
                                                )
                                                ?>">

                                    </div>


                                    <div class="col-md-6 mb-3">

                                        <label for="Estado" class="form-label">

                                            Estado

                                        </label>


                                        <select name="Estado" id="Estado" class="form-select">

                                            <option value="1" <?=
                                                (int) 
                                                $inspector["Estado"]
                                                === 1
                                                ? "selected"
                                                : ""
                                                ?>>

                                                Activo

                                            </option>


                                            <option value="0" <?=
                                                (int) 
                                                $inspector["Estado"]
                                                === 0
                                                ? "selected"
                                                : ""
                                                ?>>

                                                Inactivo

                                            </option>

                                        </select>

                                    </div>


                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            Rol

                                        </label>


                                        <input type="text" class="form-control" value="Inspector" disabled>

                                    </div>

                                </div>


                                <div class="d-flex gap-2">

                                    <button type="submit" name="btnActualizarInspector" class="btn btn-primary">

                                        Guardar cambios

                                    </button>


                                    <a href="GestionInspectores.php" class="btn btn-outline-secondary">

                                        Cancelar

                                    </a>

                                </div>

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