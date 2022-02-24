$(document).ready(function () {

    $('#idTablaNomenclatura').DataTable({
        "pageLength": 5,
        "scrollX": false,
        "columnDefs": [
            { "width": "5%", "targets": [3, 4] },
            { "width": "20%", "targets": [1] },
            { "width": "1%", "targets": 0 }
        ],
        "dom": 
            '<"container-fluid p-4"' +
            '<"row" ' +
            '<"col-sm-6 col-md-8 col-lg-9 col-xl-10"' +
            'f' +
            '>' +
            '<"col-sm-6 col-md-4 col-lg-3 col-xl-2 text-center" ' +
            '<"contenedorDivAuxNomenclatura d-flex justify-content-center text-center"' +
            '<"btn btn-primary btnAgregarNomenclatura-contenido btnAgregarNomenclatura d-flex justify-content-center" ' +
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

    $('#contenedorDataTable').on('click', '.btnAgregarNomenclatura', function (e) {
        $("#modalAgregarNomenclatura").modal("show");
    });

    $('#idTablaNomenclatura').on('click', '.btnEditarNomenclatura', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        $.ajax({
            url: 'http://localhost/order/dispositivo/getNomenclaturaByCode',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
        })
            .done(function (data) {
                $('#pCodigoModalNomenclatura').text('ID: ' + data['ID_DISPOSITIVO_NOMENCLATURA']);
                $('#inputModalCodigoNomenclatura').val(data['ID_DISPOSITIVO_NOMENCLATURA']);
                $('#inputModalNombreNomenclatura').val(data['NOMENCLATURA']);
                $('#inputModalDescripcionNomenclatura').val(data['DESCRIPCION']);
                $("#modalEditarNomenclatura").modal("show");
            });
    });

    $('#idTablaNomenclatura').on('click', '.btnBorrarNomenclatura', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        $.ajax({
            url: 'http://localhost/order/dispositivo/cantidadOrdenesPorNomenclaturaAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
        })
            .done(async function (data) {
                if (data['CANTIDAD'] != 0) {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Nomenclatura asociado a orden',
                        text: 'Esta nomenclatura esta registrada en alguna orden. No se puede eliminar.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    return;
                } else {
                    let title = "Eliminar";
                    let text = "¿Seguro que quiere eliminar esta nomenclatura?";
                    if (await alertDelete(title, text)) {
                        deleteLogicalNomenclatura(codigo)
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

    function deleteLogicalNomenclatura(codigo) {
        $.ajax({
            url: 'http://localhost/order/Dispositivo/nomenclatura_deleteAJAX',
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