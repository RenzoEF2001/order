$(document).ready(function () {
    $('#idTablaDispositivo').DataTable({
        "pageLength": 5,
        "scrollX": false,
        "columnDefs": [
            { "width": "5%", "targets": [5,6,7] },
            { "width": "1%", "targets": 0 }
        ],
        
    });

    $('.btnDetallesDispositivo').bind('click', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        $.ajax({
            url: 'http://localhost/order/dispositivo/getDetallesDispositivo',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
        })
        .done(function(data){
            $('#inputModalCodigoDispositivo').val(data['COD_DISPOSITIVO']);
            $('#inputModalNombreDispositivo').val(data['NOMBRE']);
            $('#inputModalTipoSistemaDispositivo').val(data['SISTEMA']);
            $('#inputModalNomenclaturaDispositivo').val(data['NOMENCLATURA']);
            $('#inputModalDescripcionDispositivo').val(data['DESCRIPCION']);
            $('#imgModalImagenDispositivo').attr('src',`http://localhost/order/imagenes/dispositivo/${data['IMAGEN']}`);
            $("#modalDetalleDispositivo").modal("show");
        });

    });


    $('.btnEliminarDispositivo').bind('click', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        $.ajax({
            url: 'http://localhost/order/dispositivo/cantidadOrdenesPorDispositivoAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            }
        })
        .done(async function(data){
            if(data['CANTIDAD'] != 0){
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Dispositivo asociado a orden',
                    text: 'Este dispositivo esta registrado en alguna orden. No se puede eliminar.',
                    showConfirmButton: false,
                    timer: 1500
                })
                return;
            }else{
                let title = "Eliminar";
                let text = "¿Seguro que quiere eliminar este dispositivo?";
                if(await alertDelete(title, text)){
                    deleteLogicalDispositivo(codigo)
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

    function deleteLogicalDispositivo(codigo) {
        $.ajax({
            url: 'http://localhost/order/Dispositivo/deleteAJAX',
            data: { codigo: codigo},
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