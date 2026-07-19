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
                            <form action="" method="post" class="needs-validation" id="formRegistrarPuente"
                                name="formRegistrarPuente" novalidate>
                                <div class="mb-4">
                                    <h1 class="h3 mb-2">Registrar Puente</h1>
                                    <p class="text-muted mb-3">Completa los datos del puente para registrar la
                                        información en el sistema.</p>
                                </div>

                                <!-- Código -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="CodigoPuente">Código del puente</label>
                                    <input class="form-control" id="CodigoPuente" name="CodigoPuente" type="text"
                                        required>
                                    <div class="invalid-feedback">Ingresa el código del puente.</div>
                                </div>

                                <!-- Nombre -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="nombrePuente">Nombre del puente</label>
                                    <input class="form-control" id="nombrePuente" name="nombrePuente" type="text"
                                        required>
                                    <div class="invalid-feedback">Ingresa el nombre del puente.</div>
                                </div>

                                <!-- Número de ruta -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="numeroRuta">Número de ruta</label>
                                    <input class="form-control" id="numeroRuta" name="numeroRuta" type="number"
                                        required>
                                    <div class="invalid-feedback">Ingresa el número de ruta.</div>
                                </div>

                                <!-- Clasificación de ruta -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="clasificacionRuta">Clasificación de ruta</label>
                                    <select class="form-control" id="clasificacionRuta" name="clasificacionRuta"
                                        required>
                                        <option value="">Seleccione...</option>
                                        <option value="nacional primaria">Nacional primaria</option>
                                        <option value="nacional secundaria">Nacional secundaria</option>
                                        <option value="nacional terciaria">Nacional terciaria</option>
                                        <option value="cantonal">Cantonal</option>
                                        <option value="otra">Otra</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione la clasificación de la ruta.</div>
                                </div>

                                <!-- Provincia -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="provincia">Provincia</label>
                                    <select class="form-control" id="provincia" name="provincia" required>
                                        <option value="">Seleccione...</option>
                                        <option value="San José">San José</option>
                                        <option value="Alajuela">Alajuela</option>
                                        <option value="Cartago">Cartago</option>
                                        <option value="Heredia">Heredia</option>
                                        <option value="Guanacaste">Guanacaste</option>
                                        <option value="Puntarenas">Puntarenas</option>
                                        <option value="Limón">Limón</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione la provincia.</div>
                                </div>

                                <!-- Cantón -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="canton">Cantón</label>
                                    <input class="form-control" id="canton" name="canton" type="text" required>
                                    <div class="invalid-feedback">Ingrese el cantón.</div>
                                </div>

                                <!-- Coordenadas -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="coordenadas">Coordenadas (grados decimales)</label>
                                    <input class="form-control" id="coordenadas" name="coordenadas" type="text"
                                        required>
                                    <div class="invalid-feedback">Ingrese las coordenadas.</div>
                                </div>

                                <!-- Tipo de estructura -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="tipoEstructura">Tipo de estructura</label>
                                    <select class="form-control" id="tipoEstructura" name="tipoEstructura" required>
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
                                    <div class="invalid-feedback">Seleccione el tipo de estructura.</div>
                                </div>

                                <!-- Material principal -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="materialPrincipal">Material principal</label>
                                    <select class="form-control" id="materialPrincipal" name="materialPrincipal"
                                        required>
                                        <option value="">Seleccione...</option>
                                        <option value="concreto reforzado">Concreto reforzado</option>
                                        <option value="concreto preesforzado">Concreto preesforzado</option>
                                        <option value="acero">Acero</option>
                                        <option value="madera">Madera</option>
                                        <option value="mampostería">Mampostería</option>
                                        <option value="mixto">Mixto</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione el material principal.</div>
                                </div>

                                <!-- Longitud total -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="longitudTotal">Longitud total (m)</label>
                                    <input class="form-control" id="longitudTotal" name="longitudTotal" type="number"
                                        step="0.01" required>
                                    <div class="invalid-feedback">Ingrese la longitud total.</div>
                                </div>

                                <!-- Número de tramos -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="numeroTramos">Número de tramos</label>
                                    <input class="form-control" id="numeroTramos" name="numeroTramos" type="number"
                                        required>
                                    <div class="invalid-feedback">Ingrese el número de tramos.</div>
                                </div>

                                <!-- Número de superestructuras -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="numeroSuperestructuras">Número de
                                        superestructuras</label>
                                    <input class="form-control" id="numeroSuperestructuras"
                                        name="numeroSuperestructuras" type="number" required>
                                    <div class="invalid-feedback">Ingrese el número de superestructuras.</div>
                                </div>

                                <!-- Fecha de construcción -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="fechaConstruccion">Fecha de construcción</label>
                                    <input class="form-control" id="fechaConstruccion" name="fechaConstruccion"
                                        type="date" required>
                                    <div class="invalid-feedback">Ingrese la fecha de construcción.</div>
                                </div>

                                <!-- Importancia -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="importancia">Importancia</label>
                                    <select class="form-control" id="importancia" name="importancia" required>
                                        <option value="">Seleccione...</option>
                                        <option value="puente crítico">Puente crítico</option>
                                        <option value="puente esencial">Puente esencial</option>
                                        <option value="puente convencional">Puente convencional</option>
                                        <option value="otro puente">Otro puente</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione la importancia.</div>
                                </div>

                                <!-- Servicios públicos -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="serviciosPublicos">Servicios públicos</label>
                                    <select class="form-control" id="serviciosPublicos" name="serviciosPublicos[]"
                                        multiple required>
                                        <option value="agua potable">Agua potable</option>
                                        <option value="alcantarillado">Alcantarillado</option>
                                        <option value="electricidad">Electricidad</option>
                                        <option value="telecomunicaciones">Telecomunicaciones</option>
                                        <option value="tubería de combustible">Tubería de combustible</option>
                                        <option value="otros">Otros</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione los servicios públicos.</div>
                                </div>
                                <!-- Restricción de Peso -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="restriccionPeso">Restricción de peso
                                        (toneladas)</label>
                                    <!-- Usamos type="number" y step="0.01" por si permite decimales -->
                                    <input class="form-control" id="restriccionPeso" name="restriccionPeso"
                                        type="number" step="0.01" required>
                                    <div class="invalid-feedback">Ingrese la restricción de peso. Si no tiene, ingrese
                                        0.</div>
                                </div>

                                <!-- Restricción de Altura -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="restriccionAltura">Restricción de altura (m)</label>
                                    <!-- Usamos type="number" y step="0.01" por si permite decimales -->
                                    <input class="form-control" id="restriccionAltura" name="restriccionAltura"
                                        type="number" step="0.01" required>
                                    <div class="invalid-feedback">Ingrese la restricción de altura. Si no tiene, ingrese
                                        0.</div>
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
</body>

</html>