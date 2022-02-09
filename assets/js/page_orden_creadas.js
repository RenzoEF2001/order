$(document).ready(function () {

    $('#tablaOrdenCreada').DataTable({
        "pageLength": 5,
        "scrollX": false,
        searching: false,
        info: false,
        buttons: [],
        "columnDefs": [
            { "width": "5%", "targets": [6, 7, 8] },
            { "width": "1%", "targets": 0 },
            { "width": "1%", "targets": 3 },
        ],
        "dom": 't<"row m-auto mt-2"p>'
    });

    $('#tablaModal1OrdenCreada').DataTable({
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

    $('#tablaAsignarOrdenCreada').DataTable({
        "pageLength": 5,
        "scrollX": false,
        searching: true,
        info: false,
        buttons: [],
        select: 'single',
        "dom": '<"row m-auto"f>t<"row m-auto mt-2"p>'
    });

    $('.btnDetallesOrdenCreada').bind('click', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;

        $.ajax({
            url: 'http://localhost/order/orden/getOrdenDetallePerOrdenAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
        }).done(function (data) {
            $('#tablaModalBody1OrdenCreada').empty();
            let cont = 0;

            $('#codigoOrdenCreada').text('CODIGO ORDEN: ' + data['orden'][0]['COD_ORDEN']);
            $('#clienteOrdenCreada').val(data['orden'][0]['RAZON_SOCIAL']);
            $('#sucursalOrdenCreada').val(data['orden'][0]['DIRECCION']);
            $('#asuntoOrdenCreada').val(data['orden'][0]['ASUNTO']);
            $('#remitenteOrdenCreada').val(data['orden'][0]['REMITENTE']);

            for (let valor of data['ordendetalle']) {
                $('#tablaModalBody1OrdenCreada').append(`
                    <tr>
                        <td>${valor['COD_ORDEN_DETALLE']}</td>
                        <td>${valor['DESCRIPCION']}</td>
                        <td>${valor['NOMBRE']}</td>
                        <td>${valor['DESCRIPCION_PROBLEMA']}</td>
                        
                        <td class="text-center"><button type="button" class="btnDetalles2OrdenCreada btn btn-outline btn-rounded btn-icon" data-codigo="${valor['COD_ORDEN_DETALLE']}"><i class="mdi mdi-library-books mdi-18px text-info"></i></button></td>
                    </tr>
                `);
            }
            $('#modalOrdenCreada').modal('show');

            generateEvent();
        });

    });

    function generateEvent() {
        $('.btnDetalles2OrdenCreada').bind('click', function (e) {
            target = e.currentTarget;
            let codigo = target.dataset.codigo;
            $('#modalOrdenCreada').modal('hide');
            $('#modalDetallesOrdenCreada').modal('show');
            $.ajax({
                url: 'http://localhost/order/orden/getOrdenDetallePerCodeAJAX',
                data: { codigo: codigo },
                type: 'POST',
                dataType: 'json',
            }).done(function (data) {
                $('#tiposistemaOrdenCreada').val(data[0]['DESCRIPCION']);
                $('#dispositivoOrdenCreada').val(data[0]['NOMBRE']);
                $('#descripcionProblemaOrdenCreada').val(data[0]['DESCRIPCION_PROBLEMA']);

                let imagenes = data[0]['IMAGENES'].split(',')
                $('#carruselOrdenCreada').empty();
                for (let i = 0; i < imagenes.length; i++) {
                    if (i == 0) {
                        $('#carruselOrdenCreada').append(`
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="http://localhost/order/assets/images/ordenes/${imagenes[i]}"
                                    alt="First slide">
                            </div>
                        `);
                    } else {
                        $('#carruselOrdenCreada').append(`
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="http://localhost/order/assets/images/ordenes/${imagenes[i]}"
                                    alt="First slide">
                            </div>
                         `);
                    }
                }
            });

        });
    }

    $('#btnAtrasOrdenCreada').click(function () {
        $('#modalOrdenCreada').modal('show');
        $('#modalDetallesOrdenCreada').modal('hide');
    });

    $('.btnAsignarOrdenCreada').bind('click', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        $('#codigoAsignarOrdenCreada').text(codigo);
        $('#codigoAsignarOrdenCreada').attr("data-codigo", codigo);
        $('#modalAsignarOrdenCreada').modal('show');
    });

    $('#btnAsignarConfirmarOrdenCreada').click(async function () {
        let table = $('#tablaAsignarOrdenCreada').DataTable();

        let data = table.row({ selected: true }).data();

        let icon = '';
        let title = '';
        let text = '';

        if (data == null) {
            icon = 'info';
            title = 'Seleccione un empleado';
            text = 'Debe seleccionar un empleado antes de asignarlo a la orden.';
            alertStatus(title, text, icon);
            return;
        }

        let codigoEmpleado = data[1];
        let codigoOrden = $('#codigoAsignarOrdenCreada').attr("data-codigo");

        let estado = await asignarEmpleado(codigoEmpleado, codigoOrden);

        if (estado) {
            icon = 'success';
            title = 'Asignado correctamente';
            alertStatus(title, text, icon).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    location.reload();
                }
            });
        } else {
            icon = 'error';
            title = 'Ocurrio un error';
            alertStatus(title, text, icon);
        }


    });

    function alertStatus(title, text, icon) {
        return Swal.fire({
            position: 'center',
            icon: icon,
            title: title,
            html: text,
            showConfirmButton: false,
            allowOutsideClick: false,
            timer: 1500,
            didOpen: () => {
                timerInterval = setInterval(() => 100)
            }
        });
    }

    async function asignarEmpleado(codigoEmpleado, codigoOrden) {
        let response = await $.ajax({
            url: 'http://localhost/order/orden/asignarEmpleado',
            data: { codigoEmpleado: codigoEmpleado, codigoOrden: codigoOrden },
            type: 'POST',
            dataType: 'json',
        }).done(function (data) {
            return data;
        });
        return response
    }

});