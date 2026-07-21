<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Model/UtilitarioModel.php';


function DashboardObtenerEscalar($conn, $sql, $campo)
{
    $resultado = $conn->query($sql);

    if (!$resultado) {
        return 0;
    }

    $fila = $resultado->fetch_assoc();
    $resultado->free();

    if (!$fila || !isset($fila[$campo])) {
        return 0;
    }

    return (int) $fila[$campo];
}


function DashboardObtenerLista($conn, $sql)
{
    $resultado = $conn->query($sql);

    if (!$resultado) {
        return array();
    }

    $filas = array();

    while ($fila = $resultado->fetch_assoc()) {
        $filas[] = $fila;
    }

    $resultado->free();

    return $filas;
}


function ConsultarDashboardModel()
{
    $conn = null;

    $dashboard = array(
        "resumen" => array(
            "totalPuentes" => 0,
            "totalInspecciones" => 0,
            "puentesCriticos" => 0,
            "rutasAfectadas" => 0
        ),
        "condiciones" => array(),
        "rutas" => array(),
        "calificaciones" => array(),
        "importancias" => array(),
        "prioridades" => array(),
        "error" => ""
    );

    try {
        $conn = OpenDB();

        /*
         * Obtiene únicamente la inspección más reciente de cada puente.
         * Cuando existen dos inspecciones en la misma fecha, se toma
         * la que tenga el consecutivo más alto.
         */
        $ultimaInspeccion = "
            SELECT i.*
            FROM tb_inspeccion i
            WHERE i.Estado = 1
              AND NOT EXISTS (
                    SELECT 1
                    FROM tb_inspeccion i2
                    WHERE i2.Estado = 1
                      AND i2.CodigoPuente = i.CodigoPuente
                      AND (
                            i2.FechaInspeccion > i.FechaInspeccion
                            OR (
                                i2.FechaInspeccion = i.FechaInspeccion
                                AND i2.ConsecutivoInspeccion >
                                    i.ConsecutivoInspeccion
                            )
                      )
              )
        ";

        $dashboard["resumen"]["totalPuentes"] =
            DashboardObtenerEscalar(
                $conn,
                "SELECT COUNT(*) AS Total
                 FROM registrarpuente",
                "Total"
            );

        $dashboard["resumen"]["totalInspecciones"] =
            DashboardObtenerEscalar(
                $conn,
                "SELECT COUNT(*) AS Total
                 FROM tb_inspeccion
                 WHERE Estado = 1",
                "Total"
            );

        $dashboard["resumen"]["puentesCriticos"] =
            DashboardObtenerEscalar(
                $conn,
                "
                SELECT COUNT(*) AS Total
                FROM (
                    $ultimaInspeccion
                ) ultima
                WHERE REPLACE(
                    LOWER(ultima.CondicionPreliminar),
                    'í',
                    'i'
                ) = 'critica'
                ",
                "Total"
            );

        $dashboard["resumen"]["rutasAfectadas"] =
            DashboardObtenerEscalar(
                $conn,
                "
                SELECT COUNT(DISTINCT p.numero_ruta) AS Total
                FROM (
                    $ultimaInspeccion
                ) ultima
                INNER JOIN registrarpuente p
                    ON p.codigo = ultima.CodigoPuente
                WHERE REPLACE(
                    LOWER(ultima.CondicionPreliminar),
                    'í',
                    'i'
                ) IN ('deficiente', 'critica')
                ",
                "Total"
            );

        $dashboard["condiciones"] =
            DashboardObtenerLista(
                $conn,
                "
                SELECT
                    CASE
                        WHEN REPLACE(
                            LOWER(CondicionPreliminar),
                            'í',
                            'i'
                        ) = 'buena'
                            THEN 'Buena'

                        WHEN REPLACE(
                            LOWER(CondicionPreliminar),
                            'í',
                            'i'
                        ) = 'regular'
                            THEN 'Regular'

                        WHEN REPLACE(
                            LOWER(CondicionPreliminar),
                            'í',
                            'i'
                        ) = 'deficiente'
                            THEN 'Deficiente'

                        WHEN REPLACE(
                            LOWER(CondicionPreliminar),
                            'í',
                            'i'
                        ) = 'critica'
                            THEN 'Crítica'

                        ELSE 'Sin clasificar'
                    END AS Condicion,

                    COUNT(*) AS Cantidad

                FROM (
                    $ultimaInspeccion
                ) ultima

                GROUP BY Condicion

                ORDER BY
                    CASE Condicion
                        WHEN 'Buena' THEN 1
                        WHEN 'Regular' THEN 2
                        WHEN 'Deficiente' THEN 3
                        WHEN 'Crítica' THEN 4
                        ELSE 5
                    END
                "
            );

        $dashboard["rutas"] =
            DashboardObtenerLista(
                $conn,
                "
                SELECT
                    CONCAT('Ruta ', p.numero_ruta) AS Ruta,
                    COUNT(*) AS Cantidad

                FROM (
                    $ultimaInspeccion
                ) ultima

                INNER JOIN registrarpuente p
                    ON p.codigo = ultima.CodigoPuente

                WHERE REPLACE(
                    LOWER(ultima.CondicionPreliminar),
                    'í',
                    'i'
                ) IN ('deficiente', 'critica')

                GROUP BY p.numero_ruta

                ORDER BY
                    Cantidad DESC,
                    p.numero_ruta ASC

                LIMIT 8
                "
            );

        $dashboard["calificaciones"] =
            DashboardObtenerLista(
                $conn,
                "
                SELECT
                    Calificacion,
                    COUNT(*) AS Cantidad

                FROM tb_detalle_inspeccion

                WHERE EsAplicable = 1
                  AND Calificacion IS NOT NULL
                  AND Calificacion BETWEEN 1 AND 5

                GROUP BY Calificacion

                ORDER BY Calificacion
                "
            );

        $dashboard["importancias"] =
            DashboardObtenerLista(
                $conn,
                "
                SELECT
                    CASE
                        WHEN importancia IS NULL
                             OR TRIM(importancia) = ''
                            THEN 'Sin clasificar'
                        ELSE importancia
                    END AS Importancia,

                    COUNT(*) AS Cantidad

                FROM registrarpuente

                GROUP BY Importancia

                ORDER BY Cantidad DESC
                "
            );

        $dashboard["prioridades"] =
            DashboardObtenerLista(
                $conn,
                "
                SELECT
                    p.codigo,
                    p.nombre,
                    p.numero_ruta,
                    p.provincia,
                    p.canton,
                    ultima.FechaInspeccion,
                    ultima.IndiceDeterioro,
                    COALESCE(
                        NULLIF(
                            ultima.CondicionPreliminar,
                            ''
                        ),
                        'Sin clasificar'
                    ) AS CondicionPreliminar

                FROM (
                    $ultimaInspeccion
                ) ultima

                INNER JOIN registrarpuente p
                    ON p.codigo = ultima.CodigoPuente

                ORDER BY
                    COALESCE(
                        ultima.IndiceDeterioro,
                        0
                    ) DESC,
                    ultima.FechaInspeccion DESC,
                    p.nombre ASC

                LIMIT 10
                "
            );

        CloseDB($conn);

        return $dashboard;

    } catch (Exception $e) {
        if ($conn) {
            CloseDB($conn);
        }

        $dashboard["error"] =
            "No fue posible cargar la información del dashboard.";

        return $dashboard;
    }
}