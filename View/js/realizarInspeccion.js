$(function () {

    const formulario =
        $("#formRealizarInspeccion");

    const codigoPuente =
        $("#codigoPuente");

    const datosInspeccion =
        $("#datosInspeccion");

    const calificaciones =
        $(".selector-calificacion");


    function CalcularCondicion(indice) {

        if (indice >= 1 && indice < 2) {
            return "Buena";
        }

        if (indice >= 2 && indice < 3) {
            return "Regular";
        }

        if (indice >= 3 && indice < 4) {
            return "Deficiente";
        }

        if (indice >= 4 && indice <= 5) {
            return "Crítica";
        }

        return "Sin clasificar";
    }


    function ActualizarResultados() {

        let totalDanio = 0;
        let totalElementos = 0;


        calificaciones.each(function () {

            const valor =
                $(this).val();

            if (
                valor != ""
                && valor != "NA"
            ) {

                totalDanio +=
                    Number(valor);

                totalElementos++;
            }
        });


        let indice = 0;


        if (totalElementos > 0) {

            indice =
                totalDanio
                / totalElementos;
        }


        $("#danioAcumulado")
            .val(totalDanio);


        $("#cantidadElementos")
            .val(totalElementos);


        $("#indiceDeterioro")
            .val(
                indice.toFixed(2)
            );


        $("#condicionPreliminar")
            .val(
                CalcularCondicion(
                    indice
                )
            );
    }


    function ActualizarImagen(selector) {

        const fila =
            $(selector)
                .closest("tr");

        const imagen =
            fila.find(
                ".imagen-danio"
            );

        const valor =
            $(selector).val();


        if (
            valor == "4"
            || valor == "5"
        ) {

            imagen.prop(
                "disabled",
                false
            );

        } else {

            imagen.prop(
                "disabled",
                true
            );

            imagen.val("");

            imagen.removeClass(
                "is-invalid"
            );
        }
    }


    function ObservacionObligatoria(
        elemento
    ) {

        const calificacion =
            $(elemento)
                .closest("tr")
                .find(
                    ".selector-calificacion"
                )
                .val();


        return (
            calificacion != ""
            && calificacion != "NA"
            && Number(calificacion) > 1
        );
    }


    function ImagenObligatoria(
        elemento
    ) {

        const calificacion =
            $(elemento)
                .closest("tr")
                .find(
                    ".selector-calificacion"
                )
                .val();


        return (
            calificacion == "4"
            || calificacion == "5"
        );
    }


    codigoPuente.on(
        "change",
        function () {

            datosInspeccion.prop(
                "disabled",
                $(this).val() == ""
            );

            $(this)
                .removeClass(
                    "is-invalid"
                );
        }
    );


    calificaciones.on(
        "change",
        function () {

            ActualizarResultados();

            ActualizarImagen(
                this
            );


            const fila =
                $(this)
                    .closest("tr");


            fila
                .find(
                    ".observacion-elemento"
                )
                .removeClass(
                    "is-invalid"
                );


            fila
                .find(
                    ".imagen-danio"
                )
                .removeClass(
                    "is-invalid"
                );
        }
    );


    $.validator.addMethod(
        "calificacionValida",
        function (value) {

            return (
                value == "NA"
                || (
                    value != ""
                    && Number(value) >= 1
                    && Number(value) <= 5
                )
            );
        },
        "Seleccione una calificación válida."
    );


    $.validator.addMethod(
        "observacionRequerida",
        function (
            value,
            element
        ) {

            if (
                !ObservacionObligatoria(
                    element
                )
            ) {
                return true;
            }


            return (
                $.trim(value) != ""
            );
        },
        "Ingrese una observación para calificaciones mayores a 1."
    );


    $.validator.addMethod(
        "imagenRequerida",
        function (
            value,
            element
        ) {

            if (
                !ImagenObligatoria(
                    element
                )
            ) {
                return true;
            }


            return (
                element.files
                && element.files.length > 0
            );
        },
        "Debe agregar una imagen para calificación 4 o 5."
    );


    $.validator.addMethod(
        "pngOnly",
        function (
            value,
            element
        ) {

            if (
                !element.files
                || element.files.length == 0
            ) {
                return true;
            }


            const archivo =
                element.files[0];


            const extensionEsPng =
                /\.png$/i.test(
                    archivo.name
                );


            const mimeEsPng =
                archivo.type
                == "image/png";


            return (
                extensionEsPng
                && mimeEsPng
            );
        },
        "Solo se permiten imágenes PNG."
    );


    $.validator.addMethod(
        "fileSize",
        function (
            value,
            element,
            maxBytes
        ) {

            if (
                !element.files
                || element.files.length == 0
            ) {
                return true;
            }


            return (
                element.files[0].size
                <= maxBytes
            );
        },
        "La imagen no puede superar 2 MB."
    );


    formulario.validate({

        rules: {

            codigoPuente: {
                required: true
            },

            fechaInspeccion: {
                required: true,
                date: true
            },

            observacionGeneral: {
                maxlength: 1000
            }
        },


        messages: {

            codigoPuente: {

                required:
                    "Seleccione un puente."
            },

            fechaInspeccion: {

                required:
                    "Ingrese la fecha de inspección.",

                date:
                    "Ingrese una fecha válida."
            },

            observacionGeneral: {

                maxlength:
                    "La observación general no puede superar 1000 caracteres."
            }
        },


        errorElement:
            "div",


        errorPlacement:
            function (
                error,
                element
            ) {

                error.addClass(
                    "invalid-feedback"
                );


                element
                    .closest(
                        "td, .mb-3"
                    )
                    .append(
                        error
                    );
            },


        highlight:
            function (element) {

                $(element)
                    .addClass(
                        "is-invalid"
                    );
            },


        unhighlight:
            function (element) {

                $(element)
                    .removeClass(
                        "is-invalid"
                    );
            }
    });


    calificaciones.each(
        function () {

            $(this).rules(
                "add",
                {
                    required: true,

                    calificacionValida:
                        true,

                    messages: {

                        required:
                            "Seleccione una calificación o N/A."
                    }
                }
            );
        }
    );


    $(".observacion-elemento")
        .each(
            function () {

                $(this).rules(
                    "add",
                    {
                        observacionRequerida:
                            true,

                        maxlength:
                            500,

                        messages: {

                            maxlength:
                                "La observación no puede superar 500 caracteres."
                        }
                    }
                );
            }
        );


    $(".imagen-danio")
        .each(
            function () {

                $(this).rules(
                    "add",
                    {
                        imagenRequerida:
                            true,

                        pngOnly:
                            true,

                        fileSize:
                            2097152
                    }
                );
            }
        );


    calificaciones.each(
        function () {

            ActualizarImagen(
                this
            );
        }
    );


    formulario
        .find(
            "input, select, textarea"
        )
        .removeClass(
            "is-valid is-invalid"
        );


    ActualizarResultados();

});