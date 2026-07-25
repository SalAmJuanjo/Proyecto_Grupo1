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

        <?php aside(); ?>
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
                                        <option value="nacional primaria">Nacional primaria</option>
                                        <option value="nacional secundaria">Nacional secundaria</option>
                                        <option value="nacional terciaria">Nacional terciaria</option>
                                        <option value="cantonal">Cantonal</option>
                                        <option value="otra">Otra</option>
                                    </select>
                                </div>

                                <!-- Provincia -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="provincia">Provincia</label>
                                    <select class="form-control" id="provincia" name="provincia">
                                        <option value="">Seleccione...</option>
                                        <option value="San José">San José</option>
                                        <option value="Alajuela">Alajuela</option>
                                        <option value="Cartago">Cartago</option>
                                        <option value="Heredia">Heredia</option>
                                        <option value="Guanacaste">Guanacaste</option>
                                        <option value="Puntarenas">Puntarenas</option>
                                        <option value="Limón">Limón</option>
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
                                        <option value="vigas">Vigas</option>
                                        <option value="cercha">Cercha</option>
                                        <option value="arco">Arco</option>
                                        <option value="marco rígido">Marco rígido</option>
                                        <option value="colgante">Colgante</option>
                                        <option value="atirantado">Atirantado</option>
                                        <option value="modular provisional">Modular provisional</option>
                                        <option value="otra">Otra</option>
                                    </select>
                                </div>

                                <!-- Material principal -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="materialPrincipal">Material principal</label>
                                    <select class="form-control" id="materialPrincipal" name="materialPrincipal">
                                        <option value="">Seleccione...</option>
                                        <option value="concreto reforzado">Concreto reforzado</option>
                                        <option value="concreto preesforzado">Concreto preesforzado</option>
                                        <option value="acero">Acero</option>
                                        <option value="madera">Madera</option>
                                        <option value="mampostería">Mampostería</option>
                                        <option value="mixto">Mixto</option>
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
                                        <option value="puente crítico">Puente crítico</option>
                                        <option value="puente esencial">Puente esencial</option>
                                        <option value="puente convencional">Puente convencional</option>
                                        <option value="otro puente">Otro puente</option>
                                    </select>
                                </div>

                                <!-- Servicios públicos -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="serviciosPublicos">Servicios públicos</label>
                                    <select class="form-control" id="serviciosPublicos" name="serviciosPublicos[]"
                                        multiple>
                                        <option value="agua potable">Agua potable</option>
                                        <option value="alcantarillado">Alcantarillado</option>
                                        <option value="electricidad">Electricidad</option>
                                        <option value="telecomunicaciones">Telecomunicaciones</option>
                                        <option value="tubería de combustible">Tubería de combustible</option>
                                        <option value="otros">Otros</option>
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