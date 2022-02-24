$(document).ready(function () {

    $('#idTablaTipoSistema').DataTable({
        "pageLength": 5,
        "scrollX": false,
        "columnDefs": [
            { "width": "5%", "targets": [3, 4] },
            { "width": "1%", "targets": 0 }
        ],
        "dom": 
            '<"container-fluid p-4"' +
            '<"row" ' +
            '<"col-sm-6 col-md-8 col-lg-9 col-xl-10"' +
            'f' +
            '>' +
            '<"col-sm-6 col-md-4 col-lg-3 col-xl-2 text-center" ' +
            '<"contenedorDivAuxTipoSistema d-flex justify-content-center text-center"' +
            '<"btn btn-primary btnAgregar-contenido btnAgregarTipoSistema d-flex justify-content-center" ' +
            '<"mdi mdi-plus-box ml-2">' +
            '>' +
            '>' +
            '>' +
            '>' +
            '>' +
            'rt' +
            '<"d-flex d-flex justify-content-between p-4"' +
            'p' +
            'B' +
            '>'
    });

    $('#contenedorDataTable').on('click', '.btnAgregarTipoSistema', function (e) {
        $("#modalAgregarTipoSistema").modal("show");
    });

    $('#idTablaTipoSistema').on('click', '.btnEditarTipoSistema', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        $.ajax({
            url: 'http://localhost/order/dispositivo/getTipoSistemaByCode',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
        })
            .done(function (data) {
                $('#pCodigoModalTipoSistema').text('CODIGO: ' + data['COD_TIPOSISTEMA']);
                $('#inputModalCodigoTipoSistema').val(data['COD_TIPOSISTEMA']);
                $('#inputModalDescripcionTipoSistema').val(data['DESCRIPCION']);
                $("#modalEditarTipoSistema").modal("show");
            });
    });

    $('#idTablaTipoSistema').on('click', '.btnBorrarTipoSistema', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        $.ajax({
            url: 'http://localhost/order/dispositivo/cantidadOrdenesPorTipoSistemaAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
        })
            .done(async function (data) {
                console.log(data);
                if (data['CANTIDAD'] != 0) {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Tipo de sistema asociado a orden',
                        text: 'Este tipo de sistema esta registrado en alguna orden. No se puede eliminar.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    return;
                } else {
                    let title = "Eliminar";
                    let text = "¿Seguro que quiere eliminar este tipo de sistema?";
                    if (await alertDelete(title, text)) {
                        deleteLogicalTipoSistema(codigo)
                    }
                }
            });
    });

    function alertDelete(title, text) {
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
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '<strong>Si, bórralo!</strong>',
            cancelButtonText: '<strong>No, cancelar!</strong>',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                return true;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                return false;
            }
        });

        return estado;
    }

    function deleteLogicalTipoSistema(codigo) {
        $.ajax({
            url: 'http://localhost/order/Dispositivo/tiposistema_deleteAJAX',
            data: { codigo: codigo },
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