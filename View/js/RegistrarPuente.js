$(function () {

    $.validator.addMethod("pngOnly", function (value, element) {
        if (this.optional(element)) {
            return true;
        }

        const archivo = element.files && element.files[0] ? element.files[0] : null;
        if (!archivo) {
            return true;
        }

        const extensionEsPng = /\.png$/i.test(archivo.name);
        const mimeEsPng = archivo.type === "image/png";
        return extensionEsPng && mimeEsPng;
    }, "La imagen debe ser formato .png.");

    $.validator.addMethod("fileSize", function (value, element, maxBytes) {
        if (this.optional(element)) {
            return true;
        }

        const archivo = element.files && element.files[0] ? element.files[0] : null;
        if (!archivo) {
            return true;
        }

        return archivo.size <= maxBytes;
    }, "La imagen no puede superar 2 MB.");

    $("#formRegistrarPuente").validate({
        rules: {
            CodigoPuente: {
                required: true
            },
            nombrePuente: {
                required: true
            },
            numeroRuta: {
                required: true,
                number: true
            },
            clasificacionRuta: {
                required: true
            },
            provincia: {
                required: true
            },
            canton: {
                required: true
            },
            coordenadas: {
                required: true
            },
            tipoEstructura: {
                required: true
            },
            materialPrincipal: {
                required: true
            },
            longitudTotal: {
                required: true,
                number: true,
                min: 0
            },
            numeroTramos: {
                required: true,
                number: true,
                min: 1
            },
            numeroSuperestructuras: {
                required: true,
                number: true,
                min: 1
            },
            fechaConstruccion: {
                required: true,
                date: true
            },
            importancia: {
                required: true
            },
            serviciosPublicos: {
                required: true
            },
            restriccionPeso: {
                required: true,
                number: true,
                min: 0
            },
            restriccionAltura: {
                required: true,
                number: true,
                min: 0
            },
            imagen: {
                required: true,
                pngOnly: true,
                fileSize: 2097152
            }
        },
        messages: {
            CodigoPuente: {
                required: "Ingresa el código del puente."
            },
            nombrePuente: {
                required: "Ingresa el nombre del puente."
            },
            numeroRuta: {
                required: "Ingresa el número de ruta.",
                number: "Debe ser un número."
            },
            clasificacionRuta: {
                required: "Seleccione la clasificación de la ruta."
            },
            provincia: {
                required: "Seleccione la provincia."
            },
            canton: {
                required: "Ingrese el cantón."
            },
            coordenadas: {
                required: "Ingrese las coordenadas."
            },
            tipoEstructura: {
                required: "Seleccione el tipo de estructura."
            },
            materialPrincipal: {
                required: "Seleccione el material principal."
            },
            longitudTotal: {
                required: "Ingrese la longitud total.",
                number: "Debe ser un número.",
                min: "Debe ser mayor a 0."
            },
            numeroTramos: {
                required: "Ingrese el número de tramos.",
                number: "Debe ser un número.",
                min: "Debe ser mayor a 0."
            },
            numeroSuperestructuras: {
                required: "Ingrese el número de superestructuras.",
                number: "Debe ser un número.",
                min: "Debe ser mayor a 0."
            },
            fechaConstruccion: {
                required: "Ingrese la fecha de construcción.",
                date: "Formato de fecha no válido."
            },
            importancia: {
                required: "Seleccione la importancia."
            },
            serviciosPublicos: {
                required: "Seleccione los servicios públicos."
            },
            restriccionPeso: {
                required: "Ingrese la restricción de peso.",
                number: "Debe ser un número.",
                min: "Debe ser mayor o igual a 0."
            },
            restriccionAltura: {
                required: "Ingrese la restricción de altura.",
                number: "Debe ser un número.",
                min: "Debe ser mayor o igual a 0."
            },
            imagen: {
                required: "Campo obligatorio.",
                pngOnly: "Solo se permiten imágenes .png.",
                fileSize: "La imagen no debe pesar más de 2 MB."
            }
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".col-md-6, .mb-3").append(error);
        },
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });

});
