<?php
 if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
 include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/PuenteModel.php';
 include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/CatalogoModel.php';


$provincias           = ListarProvinciasModel();
$clasificacionesRuta  = ListarClasificacionRutaModel();
$tiposEstructura      = ListarTipoEstructuraModel();
$materialesPrincipal  = ListarMaterialPrincipalModel();
$importancias         = ListarImportanciaModel();
$serviciosPublicosCat = ListarServiciosPublicosModel();



if(isset($_POST["btnRegistrarPuente"]))
{
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

    $imagen = '';
    if (!empty($_FILES["imagen"]["name"])) {
        $nombreImagen = basename($_FILES["imagen"]["name"]);
        $imagen = '/Proyecto_Grupo1/View/Uploads/' . $nombreImagen;
        $origen = $_FILES["imagen"]["tmp_name"];
        $destino = $_SERVER['DOCUMENT_ROOT'] . $imagen;
        move_uploaded_file($origen, $destino);
    }




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
        $restriccionAltura,
        $imagen   

    );

    if($datos)
    {
        header("Location: ../../View/vInicio/Principal.php");
        exit();
    }

    $_POST["Mensaje"] = "No se ha podido registrar la información correctamente";
}


function ListarPuentesController()
{
    $resultado =
        ListarPuentesModel();

    $puentes =
        array();


    if (
        $resultado
        && $resultado->num_rows > 0
    ) {

        while (
            $fila =
            $resultado->fetch_assoc()
        ) {

            $puentes[] =
                $fila;
        }
    }


    return $puentes;
}



function ConsultarInspeccionesPuenteController(
    $codigoPuente
) {
    $datos =
        ConsultarInspeccionesPuenteModel(
            $codigoPuente
        );

    return $datos;
}



function ConsultarDetalleInspeccionController(
    $consecutivoInspeccion
) {
    $datos =
        ConsultarDetalleInspeccionModel(
            $consecutivoInspeccion
        );

    return $datos;
}


function ConsultarDetalleInspeccionFormularioController()
{
    $consecutivoInspeccion =
        isset($_GET["id"])
            ? (int) $_GET["id"]
            : 0;

    if ($consecutivoInspeccion <= 0) {
        return array();
    }

    $datos =
        ConsultarDetalleInspeccionController(
            $consecutivoInspeccion
        );

    return $datos;
}

?>