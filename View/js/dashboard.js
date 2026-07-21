"use strict";

(function () {
    function ejecutarCuandoEsteListo(callback) {
        if (document.readyState === "loading") {
            document.addEventListener(
                "DOMContentLoaded",
                callback
            );

            return;
        }

        callback();
    }


    ejecutarCuandoEsteListo(function () {
        var dashboard =
            window.smartBridgeDashboard || {};

        var coloresCondicion = [
            "#198754",
            "#f0ad4e",
            "#fd7e14",
            "#dc3545",
            "#6c757d"
        ];

        var coloresImportancia = [
            "#dc3545",
            "#0d6efd",
            "#198754",
            "#f0ad4e",
            "#6c757d"
        ];


        function obtenerEtiquetas(datos, campo) {
            return datos.map(function (elemento) {
                return elemento[campo];
            });
        }


        function obtenerValores(datos, campo) {
            return datos.map(function (elemento) {
                return Number(elemento[campo]) || 0;
            });
        }


        function existenValores(valores) {
            return valores.some(function (valor) {
                return valor > 0;
            });
        }


        function mostrarMensajeSinDatos(
            idContenedor,
            mensaje
        ) {
            var contenedor =
                document.getElementById(idContenedor);

            if (!contenedor) {
                return;
            }

            contenedor.innerHTML =
                "<div class='dashboard-empty'>" +
                    "<strong>No hay datos disponibles</strong>" +
                    "<span>" + mensaje + "</span>" +
                "</div>";
        }


        function opcionesBase() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            usePointStyle: true,
                            padding: 18
                        }
                    },
                    tooltip: {
                        displayColors: true
                    }
                }
            };
        }


        function crearGraficoCondiciones() {
            var datos =
                dashboard.condiciones || [];

            var etiquetas =
                obtenerEtiquetas(
                    datos,
                    "Condicion"
                );

            var valores =
                obtenerValores(
                    datos,
                    "Cantidad"
                );

            if (
                etiquetas.length === 0 ||
                !existenValores(valores)
            ) {
                mostrarMensajeSinDatos(
                    "contenedorCondiciones",
                    "Todavía no existen inspecciones clasificadas."
                );

                return;
            }

            var canvas =
                document.getElementById(
                    "graficoCondiciones"
                );

            new Chart(canvas, {
                type: "doughnut",
                data: {
                    labels: etiquetas,
                    datasets: [
                        {
                            data: valores,
                            backgroundColor:
                                coloresCondicion,
                            borderWidth: 2,
                            borderColor: "#ffffff"
                        }
                    ]
                },
                options: Object.assign(
                    opcionesBase(),
                    {
                        cutout: "62%",
                        plugins: {
                            legend: {
                                position: "bottom",
                                labels: {
                                    usePointStyle: true,
                                    padding: 18
                                }
                            }
                        }
                    }
                )
            });
        }


        function crearGraficoRutas() {
            var datos =
                dashboard.rutas || [];

            var etiquetas =
                obtenerEtiquetas(
                    datos,
                    "Ruta"
                );

            var valores =
                obtenerValores(
                    datos,
                    "Cantidad"
                );

            if (
                etiquetas.length === 0 ||
                !existenValores(valores)
            ) {
                mostrarMensajeSinDatos(
                    "contenedorRutas",
                    "No existen rutas con puentes deficientes o críticos."
                );

                return;
            }

            var canvas =
                document.getElementById(
                    "graficoRutas"
                );

            new Chart(canvas, {
                type: "bar",
                data: {
                    labels: etiquetas,
                    datasets: [
                        {
                            label: "Puentes afectados",
                            data: valores,
                            backgroundColor:
                                "rgba(220, 53, 69, 0.78)",
                            borderColor:
                                "rgba(220, 53, 69, 1)",
                            borderWidth: 1,
                            borderRadius: 7
                        }
                    ]
                },
                options: Object.assign(
                    opcionesBase(),
                    {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                )
            });
        }


        function crearGraficoCalificaciones() {
            var datosOriginales =
                dashboard.calificaciones || [];

            var cantidades = {
                1: 0,
                2: 0,
                3: 0,
                4: 0,
                5: 0
            };

            datosOriginales.forEach(
                function (elemento) {
                    var nota =
                        Number(
                            elemento.Calificacion
                        );

                    if (
                        nota >= 1 &&
                        nota <= 5
                    ) {
                        cantidades[nota] =
                            Number(
                                elemento.Cantidad
                            ) || 0;
                    }
                }
            );

            var etiquetas = [
                "Nota 1",
                "Nota 2",
                "Nota 3",
                "Nota 4",
                "Nota 5"
            ];

            var valores = [
                cantidades[1],
                cantidades[2],
                cantidades[3],
                cantidades[4],
                cantidades[5]
            ];

            if (!existenValores(valores)) {
                mostrarMensajeSinDatos(
                    "contenedorCalificaciones",
                    "No hay calificaciones registradas."
                );

                return;
            }

            var canvas =
                document.getElementById(
                    "graficoCalificaciones"
                );

            new Chart(canvas, {
                type: "bar",
                data: {
                    labels: etiquetas,
                    datasets: [
                        {
                            label: "Elementos evaluados",
                            data: valores,
                            backgroundColor: [
                                "rgba(25, 135, 84, 0.78)",
                                "rgba(13, 202, 240, 0.78)",
                                "rgba(255, 193, 7, 0.78)",
                                "rgba(253, 126, 20, 0.78)",
                                "rgba(220, 53, 69, 0.78)"
                            ],
                            borderWidth: 1,
                            borderRadius: 7
                        }
                    ]
                },
                options: Object.assign(
                    opcionesBase(),
                    {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                )
            });
        }


        function crearGraficoImportancias() {
            var datos =
                dashboard.importancias || [];

            var etiquetas =
                obtenerEtiquetas(
                    datos,
                    "Importancia"
                );

            var valores =
                obtenerValores(
                    datos,
                    "Cantidad"
                );

            if (
                etiquetas.length === 0 ||
                !existenValores(valores)
            ) {
                mostrarMensajeSinDatos(
                    "contenedorImportancias",
                    "No hay puentes clasificados por importancia."
                );

                return;
            }

            var canvas =
                document.getElementById(
                    "graficoImportancias"
                );

            new Chart(canvas, {
                type: "pie",
                data: {
                    labels: etiquetas,
                    datasets: [
                        {
                            data: valores,
                            backgroundColor:
                                coloresImportancia,
                            borderColor: "#ffffff",
                            borderWidth: 2
                        }
                    ]
                },
                options: Object.assign(
                    opcionesBase(),
                    {
                        plugins: {
                            legend: {
                                position: "bottom",
                                labels: {
                                    usePointStyle: true,
                                    padding: 16
                                }
                            }
                        }
                    }
                )
            });
        }


        function escaparCSV(valor) {
            var texto =
                String(valor || "")
                    .replace(/\s+/g, " ")
                    .trim();

            texto =
                texto.replace(/"/g, '""');

            return '"' + texto + '"';
        }


        function exportarTablaPrioridades() {
            var tabla =
                document.getElementById(
                    "tablaPrioridades"
                );

            if (!tabla) {
                alert(
                    "No hay datos disponibles para exportar."
                );

                return;
            }

            var lineas = [];

            var encabezados =
                tabla.querySelectorAll(
                    "thead th"
                );

            var filaEncabezados = [];

            encabezados.forEach(
                function (encabezado) {
                    filaEncabezados.push(
                        escaparCSV(
                            encabezado.textContent
                        )
                    );
                }
            );

            lineas.push(
                filaEncabezados.join(",")
            );

            var filas =
                tabla.querySelectorAll(
                    "tbody tr"
                );

            filas.forEach(function (fila) {
                var columnas =
                    fila.querySelectorAll("td");

                var valoresFila = [];

                columnas.forEach(
                    function (columna) {
                        valoresFila.push(
                            escaparCSV(
                                columna.textContent
                            )
                        );
                    }
                );

                lineas.push(
                    valoresFila.join(",")
                );
            });

            var contenido =
                "\ufeff" + lineas.join("\n");

            var archivo = new Blob(
                [contenido],
                {
                    type:
                        "text/csv;charset=utf-8;"
                }
            );

            var enlace =
                document.createElement("a");

            var fecha =
                new Date()
                    .toISOString()
                    .slice(0, 10);

            enlace.href =
                URL.createObjectURL(
                    archivo
                );

            enlace.download =
                "prioridades_smartbridge_" +
                fecha +
                ".csv";

            document.body.appendChild(
                enlace
            );

            enlace.click();
            enlace.remove();

            URL.revokeObjectURL(
                enlace.href
            );
        }


        function iniciarExportacion() {
            var boton =
                document.getElementById(
                    "btnExportarPrioridades"
                );

            if (!boton) {
                return;
            }

            boton.addEventListener(
                "click",
                exportarTablaPrioridades
            );
        }


        if (typeof Chart === "undefined") {
            [
                "contenedorCondiciones",
                "contenedorRutas",
                "contenedorCalificaciones",
                "contenedorImportancias"
            ].forEach(function (contenedor) {
                mostrarMensajeSinDatos(
                    contenedor,
                    "No fue posible cargar la librería de gráficos."
                );
            });

            iniciarExportacion();

            return;
        }

        crearGraficoCondiciones();
        crearGraficoRutas();
        crearGraficoCalificaciones();
        crearGraficoImportancias();
        iniciarExportacion();
    });
})();