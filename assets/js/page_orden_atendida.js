$(document).ready(function () {

    /**Valores por defecto al cargar la pagina */
    $('#inputAgregarEvidenciaOrdenAtendida').val('');
    $('#btnAgregarEvidenciaOrdenAtendida').attr("disabled", true);
    /**------------------------------------------- */


    $('#tablaOrdenAtendida').DataTable({
        "pageLength": 5,
        "scrollX": false,
        searching: false,
        info: false,
        buttons: [],
        "columnDefs": [
            { "width": "5%", "targets": [7, 8] },
            { "width": "1%", "targets": [0, 8] }
        ],
        "dom": 't<"row m-auto mt-2"p>'
    });

    $('#tablaModal1OrdenAtendida').DataTable({
        "pageLength": 5,
        "scrollX": false,
        searching: false,
        ordering: false,
        paging: false,
        info: false,
        buttons: [],
        "columnDefs": [
            { "width": "5%", "targets": [4] },
            { "width": "1%", "targets": 0 }
        ]
    });

    $('.btnDetallesOrdenAtendida').bind('click', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;

        $.ajax({
            url: 'http://localhost/order/orden/getOrdenDetallePerOrdenAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
        }).done(function (data) {
            $('#tablaModalBody1OrdenAtendida').empty();
            let cont = 0;

            $('#codigoOrdenAtendida').text('CODIGO ORDEN: ' + data['orden'][0]['COD_ORDEN']);
            $('#clienteOrdenAtendida').val(data['orden'][0]['RAZON_SOCIAL']);
            $('#sucursalOrdenAtendida').val(data['orden'][0]['DIRECCION']);
            $('#asuntoOrdenAtendida').val(data['orden'][0]['ASUNTO']);
            $('#tecnicoOrdenAtendida').val(data['orden'][0]['NOMBRE_EMPLEADO']);
            $('#remitenteOrdenAtendida').val(data['orden'][0]['REMITENTE']);
            $('#fechaOrdenAtendida').val(data['orden'][0]['FECHA_ORDEN']);
            $('#horaOrdenAtendida').val(data['orden'][0]['HORA_ORDEN']);
            $('#fechaAtencionOrdenAtendida').val(data['orden'][0]['FECHA_ATENCION']);
            $('#horaAtencionOrdenAtendida').val(data['orden'][0]['HORA_ATENCION']);

            for (let valor of data['ordendetalle']) {
                $('#tablaModalBody1OrdenAtendida').append(`
                    <tr>
                        <td>${valor['COD_ORDEN_DETALLE']}</td>
                        <td>${valor['DESCRIPCION']}</td>
                        <td>${valor['NOMBRE']}</td>
                        <td>${valor['DESCRIPCION_PROBLEMA']}</td>
                        <td class="text-center"><button type="button" class="btnDetalles2OrdenAtendida btn btn-outline btn-rounded btn-icon" data-codigo="${valor['COD_ORDEN_DETALLE']}"><i class="mdi mdi-library-books mdi-18px text-info"></i></button></td>
                    </tr>
                `);
            }
            $('#modalOrdenAtendida').modal('show');
            generateEvent();
        });

    });

    $('#tablaOrdenAtendida').on('click', 'a.btnAgregarEvidenciaOrdenAtendida', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        showDetallesOrdenesCombo(codigo)
        $('#modalAgregarEvidenciaOrdenAtendida').modal('show');
    });

    $('.btnAtendidaOrdenAtendida').bind('click', async function (e) {
        let title = 'Cambio de estado';
        let text = '¿Desea pasar esta orden de atendida a cerrada?';
        let status = await alertChange(title, text);
        if (status) {
            target = e.currentTarget;
            let codigo = target.dataset.codigo;
            $.ajax({
                url: 'http://localhost/order/orden/changeEstadoAJAX',
                data: { codigo: codigo, estado: 5 },
                type: 'POST',
                dataType: 'json',
                statusCode: {
                    200: function () {
                        location.reload();
                    }
                }
            });
        }

    });

    $("#modalAgregarEvidenciaOrdenAtendida").on("hidden.bs.modal", function () {
        $('#inputAgregarEvidenciaOrdenAtendida').val('');
        $('#btnAgregarEvidenciaOrdenAtendida').attr("disabled", true);
        $('#carruselEvidenciaOrdenAtendida').empty();
        $('#carruselEvidenciaOrdenAtendida').append(`
            <div class="carousel-item active">
                <img class="d-block w-100"
                    src="http://localhost/order/imagenes/later/no_disponible.png"
                    alt="First slide">
            </div>
        `);
    })

    $('#btnAtrasOrdenAtendida').click(function () {
        $('#modalOrdenAtendida').modal('show');
        $('#modalDetallesOrdenAtendida').modal('hide');
    });

    $('#inputAgregarEvidenciaOrdenAtendida').change(function (e) {
        if (this.files[0] !== undefined) {
            $('#btnAgregarEvidenciaOrdenAtendida').removeAttr("disabled");
        }
    })

    $('#btnAgregarEvidenciaOrdenAtendida').click(function (e) {
        let codigo = $('#cboDetallesOrdenesOrdenAtendida').val();
        let formData = new FormData();

        for (let index = 0; index < 5; index++) {
            formData.append('imagen[]', $('#inputAgregarEvidenciaOrdenAtendida')[0].files[index]);
        }

        formData.append('codigo', codigo);

        $.ajax({
            url: 'http://localhost/order/orden/addEvidenciaAJAX2',
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function () {
                let timerInterval
                Swal.fire({
                    title: 'Cargando Imagenes!',
                    html: 'Se estan cargando las imagenes <br> <b></b> milliseconds.',
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                })
            }
        }).done(function (data) {
            if(data['error'].length > 0 ){
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: data['error'][0],
                    showConfirmButton: false,
                    timer: 1500
                })
            }

            if(data['success']['success'].length > 0 || data['success']['error'].length > 0){
                let html = '<div style="text-align:left">';
                for(let valor of data['success']['success']){
                    html += `<p class="d-flex align-items-center"><i class="mdi mdi-check-circle-outline text-success"></i>&nbsp ${valor}</p>`;
                }
                for(let valor of data['success']['error']){
                    html += `<p class="d-flex align-items-center"><i class="mdi mdi-close-circle-outline text-danger"></i>&nbsp ${valor}</p>`;
                }
                html += '</div>';
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    html: html,
                    showConfirmButton: true,
                })
            }

            if(data['info'].length > 0){
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: data['info'][0],
                    showConfirmButton: false,
                    timer: 1500
                })
            }

            // Swal.fire({
            //     position: 'center',
            //     icon: 'success',
            //     title: 'Imagenes agregadas con exito.',
            //     showConfirmButton: false,
            //     timer: 1500
            // })
        })
    });

    $('#cboDetallesOrdenesOrdenAtendida').change(function (e) {
        let codigo = $('#cboDetallesOrdenesOrdenAtendida').val();
        $.ajax({
            url: 'http://localhost/order/orden/getOrdenDetallePerCodeAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
        }).done(function (data) {
            let imagenes = data[0]['IMAGENES_EVIDENCIA'].split(',')
            $('#carruselEvidenciaOrdenAtendida').empty();
            for (let i = 0; i < imagenes.length; i++) {
                if (i == 0) {
                    $('#carruselEvidenciaOrdenAtendida').append(`
                        <div class="carousel-item active">
                            <img class="d-block w-100"
                                src="http://localhost/order/imagenes/later/${imagenes[i]}"
                                alt="First slide">
                        </div>
                    `);
                } else {
                    $('#carruselEvidenciaOrdenAtendida').append(`
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                src="http://localhost/order/imagenes/later/${imagenes[i]}"
                                alt="First slide">
                        </div>
                     `);
                }
            }
        });
    });

    function showDetallesOrdenesCombo(codigo) {
        $.ajax({
            url: 'http://localhost/order/orden/getOrdenDetallePerOrdenAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
        }).done(function (data) {
            $('#cboDetallesOrdenesOrdenAtendida').empty();
            $('#cboDetallesOrdenesOrdenAtendida').append('<option value="-1">Seleccione un detalle de orden</option>')
            for (let valor of data['ordendetalle']) {
                $('#cboDetallesOrdenesOrdenAtendida').append(`
                    <option value="${valor['COD_ORDEN_DETALLE']}">${valor['COD_ORDEN_DETALLE']}</option>
                `)
            }
        });
    }

    function generateEvent() {
        $('.btnDetalles2OrdenAtendida').bind('click', function (e) {
            target = e.currentTarget;
            let codigo = target.dataset.codigo;
            $('#modalOrdenAtendida').modal('hide');
            $('#modalDetallesOrdenAtendida').modal('show');
            $.ajax({
                url: 'http://localhost/order/orden/getOrdenDetallePerCodeAJAX',
                data: { codigo: codigo },
                type: 'POST',
                dataType: 'json',
            }).done(function (data) {
                $('#tiposistemaOrdenAtendida').val(data[0]['DESCRIPCION']);
                $('#dispositivoOrdenAtendida').val(data[0]['NOMBRE']);
                $('#descripcionProblemaOrdenAtendida').val(data[0]['DESCRIPCION_PROBLEMA']);

                let imagenes = data[0]['IMAGENES'].split(',')
                let imagenes_evidencia = data[0]['IMAGENES_EVIDENCIA'].split(',')

                $('#carruselOrdenAtendida').empty();
                for (let i = 0; i < imagenes.length; i++) {
                    if (i == 0) {
                        $('#carruselOrdenAtendida').append(`
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="http://localhost/order/imagenes/back/${imagenes[i]}"
                                    alt="First slide">
                            </div>
                        `);
                    } else {
                        $('#carruselOrdenAtendida').append(`
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="http://localhost/order/imagenes/back/${imagenes[i]}"
                                    alt="First slide">
                            </div>
                         `);
                    }
                }

                $('#carruselEvidenciaCerradaOrdenAtendida').empty();
                for (let i = 0; i < imagenes_evidencia.length; i++) {
                    if (i == 0) {
                        $('#carruselEvidenciaCerradaOrdenAtendida').append(`
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="http://localhost/order/imagenes/later/${imagenes_evidencia[i]}"
                                    alt="First slide">
                            </div>
                        `);
                    } else {
                        $('#carruselEvidenciaCerradaOrdenAtendida').append(`
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="http://localhost/order/imagenes/later/${imagenes_evidencia[i]}"
                                    alt="First slide">
                            </div>
                         `);
                    }
                }

            });

        });
    }

    function alertChange(title, text) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success btn-fw ml-2',
                cancelButton: 'btn btn-danger btn-fw'
            },
            buttonsStyling: false
        })

        estado = swalWithBootstrapButtons.fire({
            title: title,
            html: text,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: '<strong>Si, cámbialo!</strong>',
            cancelButtonText: '<strong>No, cancelar!</strong>',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                /**recargar */
                return true;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                return false;
            }
        });

        return estado;
    }

});
