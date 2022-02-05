$(document).ready(function () {

    $('#tablaOrdenAtendida').DataTable({
        "pageLength": 5,
        "scrollX": false,
        searching: false,
        info: false,
        buttons: [],
        "columnDefs": [
            { "width": "5%", "targets": [6,7] },
            { "width": "1%", "targets": 0 }
        ],
        "dom": 't<"row m-auto mt-2"p>'
    });

    $('#tablaModal1OrdenAtendida').DataTable({
        "pageLength": 5,
        "scrollX": false,
        searching: false,
        ordering:  false,
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
        }).done(function(data){
            $('#tablaModalBody1OrdenAtendida').empty();
            let cont = 0;

            $('#codigoOrdenAtendida').text('CODIGO ORDEN: ' + data['orden'][0]['COD_ORDEN']);
            $('#clienteOrdenAtendida').val(data['orden'][0]['RAZON_SOCIAL']);
            $('#sucursalOrdenAtendida').val(data['orden'][0]['DIRECCION']);
            $('#asuntoOrdenAtendida').val(data['orden'][0]['ASUNTO']);
            $('#remitenteOrdenAtendida').val(data['orden'][0]['REMITENTE']);
            
            for(let valor of data['ordendetalle']){
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

    $('.btnAtendidaOrdenAtendida').bind('click', async function(e){
        let title = 'Cambio de estado';
        let text = '¿Desea pasar esta orden de atendida a cerrada?';
        let status = await alertChange(title, text);
        if(status){
            target = e.currentTarget;
            let codigo = target.dataset.codigo;
            $.ajax({
                url: 'http://localhost/order/orden/changeEstadoAJAX',
                data: { codigo: codigo, estado: 5 },
                type: 'POST',
                dataType: 'json',
            });
            location.reload();
        }
        
    });

    $('#btnAtrasOrdenAtendida').click(function(){
        $('#modalOrdenAtendida').modal('show');
        $('#modalDetallesOrdenAtendida').modal('hide');
    });


    function generateEvent(){
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
            }).done(function(data){
                $('#tiposistemaOrdenAtendida').val(data[0]['DESCRIPCION']);
                $('#dispositivoOrdenAtendida').val(data[0]['NOMBRE']);
                $('#descripcionProblemaOrdenAtendida').val(data[0]['DESCRIPCION_PROBLEMA']);

                let imagenes = data[0]['IMAGENES'].split(',')

                $('#carruselOrdenAtendida').empty();
                for (let i = 0; i < imagenes.length; i++) {
                    if (i == 0) {
                        $('#carruselOrdenAtendida').append(`
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="http://localhost/order/assets/images/ordenes/${imagenes[i]}"
                                    alt="First slide">
                            </div>
                        `);
                    } else {
                        $('#carruselOrdenAtendida').append(`
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
