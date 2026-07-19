<?php
 if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
 include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/PuenteModel.php';


if(isset($_POST["btnRegistrarPuente"]))
{
    // Datos recuperados del formulario
    $codigo = $_POST["CodigoPuente"];
    $nombre = $_POST["nombrePuente"];
    $numeroRuta = $_POST["numeroRuta"];
    $clasificacionRuta = $_POST["clasificacionRuta"];
    $provincia = $_POST["provincia"];
    $canton = $_POST["canton"];
    $coordenadas = $_POST["coordenadas"];
    $tipoEstructura = $_POST["tipoEstructura"];
    $materialPrincipal = $_POST["materialPrincipal"];
    $longitudTotal = $_POST["longitudTotal"];
    $numeroTramos = $_POST["numeroTramos"];
    $numeroSuperestructuras = $_POST["numeroSuperestructuras"];
    $fechaConstruccion = $_POST["fechaConstruccion"];
    $importancia = $_POST["importancia"];
    $restriccionPeso = $_POST["restriccionPeso"];
    $restriccionAltura = $_POST["restriccionAltura"];
    
   
    $serviciosPublicos = isset($_POST["serviciosPublicos"]) ? implode(', ', $_POST["serviciosPublicos"]) : '';

    

   
    $datos = RegistrarPuenteModel(
        $codigo, 
        $nombre, 
        $numeroRuta, 
        $clasificacionRuta, 
        $provincia, 
        $canton, 
        $coordenadas, 
        $tipoEstructura, 
        $materialPrincipal, 
        $longitudTotal, 
        $numeroTramos, 
        $numeroSuperestructuras, 
        $fechaConstruccion, 
        $importancia, 
        $serviciosPublicos,
        $restriccionPeso,    
        $restriccionAltura   
    );

    if($datos)
    {
        header("Location: ../../View/vInicio/Principal.php");
        exit();
    }

    $_POST["Mensaje"] = "No se ha podido registrar la información correctamente";
}

if (isset($_POST["btnmostrarpuentes"])) {
    $puentes = ListarPuentesModel();

    if ($puentes && $puentes->num_rows > 0) {
        while ($row = $puentes->fetch_assoc()) {
            echo "
            <div class='card mb-3'>
                <div class='card-body'>
                    <p class='card-text'>
                        <strong>Código:</strong> {$row['codigo']}<br>
                        <strong>Nombre:</strong> {$row['nombre']}<br>
                        <strong>Número de ruta:</strong> {$row['numero_ruta']}<br>
                        <strong>Clasificación de ruta:</strong> {$row['clasificacion_ruta']}<br>
                        <strong>Provincia:</strong> {$row['provincia']}<br>
                        <strong>Cantón:</strong> {$row['canton']}<br>
                        <strong>Coordenadas:</strong> {$row['coordenadas']}<br>
                        <strong>Tipo de estructura:</strong> {$row['tipo_estructura']}<br>
                        <strong>Material principal:</strong> {$row['material_principal']}<br>
                        <strong>Longitud total:</strong> {$row['longitud_total']} m<br>
                        <strong>Número de tramos:</strong> {$row['numero_tramos']}<br>
                        <strong>Número de superestructuras:</strong> {$row['numero_superestructuras']}<br>
                        <strong>Fecha construcción:</strong> {$row['fecha_construccion']}<br>
                        <strong>Importancia:</strong> {$row['importancia']}<br>
                        <strong>Servicios públicos:</strong> {$row['servicios_publicos']}<br>
                        <strong>Restricción de peso:</strong> {$row['restriccion_peso']} t<br>
                        <strong>Restricción de altura:</strong> {$row['restriccion_altura']} m
                    </p>
                </div>
            </div>";
        }
    } else {
        echo "<p>No hay puentes registrados.</p>";
    }
}
?>