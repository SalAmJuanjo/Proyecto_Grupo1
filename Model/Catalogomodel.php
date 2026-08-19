<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/UtilitarioModel.php';

   

    function ListarProvinciasModel() {
        try {
            $conn = OpenDB();
            $sql = "SELECT nombre FROM tb_provincia ORDER BY nombre";
            $response = $conn->query($sql);
            CloseDB($conn);
            return $response;
        } catch (Exception $e) {
            //AddError($e, 'ListarProvinciasModel');
            return false;
        }
    }

    function ListarClasificacionRutaModel() {
        try {
            $conn = OpenDB();
            $sql = "SELECT nombre FROM tb_clasificacion_ruta ORDER BY id";
            $response = $conn->query($sql);
            CloseDB($conn);
            return $response;
        } catch (Exception $e) {
            //AddError($e, 'ListarClasificacionRutaModel');
            return false;
        }
    }

    function ListarTipoEstructuraModel() {
        try {
            $conn = OpenDB();
            $sql = "SELECT nombre FROM tb_tipo_estructura ORDER BY id";
            $response = $conn->query($sql);
            CloseDB($conn);
            return $response;
        } catch (Exception $e) {
            //AddError($e, 'ListarTipoEstructuraModel');
            return false;
        }
    }

    function ListarMaterialPrincipalModel() {
        try {
            $conn = OpenDB();
            $sql = "SELECT nombre FROM tb_material_principal ORDER BY id";
            $response = $conn->query($sql);
            CloseDB($conn);
            return $response;
        } catch (Exception $e) {
            //AddError($e, 'ListarMaterialPrincipalModel');
            return false;
        }
    }

    function ListarImportanciaModel() {
        try {
            $conn = OpenDB();
            $sql = "SELECT nombre FROM tb_importancia ORDER BY id";
            $response = $conn->query($sql);
            CloseDB($conn);
            return $response;
        } catch (Exception $e) {
            //AddError($e, 'ListarImportanciaModel');
            return false;
        }
    }

    function ListarServiciosPublicosModel() {
        try {
            $conn = OpenDB();
            $sql = "SELECT nombre FROM tb_servicio_publico ORDER BY id";
            $response = $conn->query($sql);
            CloseDB($conn);
            return $response;
        } catch (Exception $e) {
            //AddError($e, 'ListarServiciosPublicosModel');
            return false;
        }
    }