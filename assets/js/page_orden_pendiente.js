$(document).ready(function () {

    $('#tablaOrdenPendiente').DataTable({
        "pageLength": 5,
        "scrollX": false,
        searching: false,
        ordering:  false,
        info: false,
        buttons: [],
        "columnDefs": [
            { "width": "5%", "targets": [6,7] },
            { "width": "1%", "targets": 0 }
        ],
        "dom": 't<"row m-auto mt-2"p>'
    });

    $('#tablaModal1OrdenPendiente').DataTable({
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

    $('.btnDetallesOrdenPendiente').bind('click', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        
        $.ajax({
            url: 'http://localhost/order/orden/getOrdenDetallePerOrdenAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
        }).done(function(data){
            $('#tablaModalBody1OrdenPendiente').empty();
            let cont = 0;

            $('#codigoOrdenPendiente').text('CODIGO ORDEN: ' + data['orden'][0]['COD_ORDEN']);
            $('#clienteOrdenPendiente').val(data['orden'][0]['RAZON_SOCIAL']);
            $('#sucursalOrdenPendiente').val(data['orden'][0]['DIRECCION']);
            $('#asuntoOrdenPendiente').val(data['orden'][0]['ASUNTO']);
            $('#remitenteOrdenPendiente').val(data['orden'][0]['REMITENTE']);
            
            for(let valor of data['ordendetalle']){
                $('#tablaModalBody1OrdenPendiente').append(`
                    <tr>
                        <td>${valor['COD_ORDEN_DETALLE']}</td>
                        <td>${valor['DESCRIPCION']}</td>
                        <td>${valor['NOMBRE']}</td>
                        <td>${valor['DESCRIPCION_PROBLEMA']}</td>
                        
                        <td class="text-center"><button type="button" class="btnDetalles2OrdenPendiente btn btn-outline btn-rounded btn-icon" data-codigo="${valor['COD_ORDEN_DETALLE']}"><i class="mdi mdi-library-books mdi-18px text-info"></i></button></td>
                    </tr>
                `);
            }
            $('#modalOrdenPendiente').modal('show');
            generateEvent();
        });
        
    });

    $('#btnAtrasOrdenPendiente').click(function(){
        $('#modalOrdenPendiente').modal('show');
        $('#modalDetallesOrdenPendiente').modal('hide');
    });


    function generateEvent(){
        $('.btnDetalles2OrdenPendiente').bind('click', function (e) {
            target = e.currentTarget;
            let codigo = target.dataset.codigo;
            $('#modalOrdenPendiente').modal('hide');
            $('#modalDetallesOrdenPendiente').modal('show');
            $.ajax({
                url: 'http://localhost/order/orden/getOrdenDetallePerCodeAJAX',
                data: { codigo: codigo },
                type: 'POST',
                dataType: 'json',
            }).done(function(data){
                $('#tiposistemaOrdenPendiente').val(data[0]['DESCRIPCION']);
                $('#dispositivoOrdenPendiente').val(data[0]['NOMBRE']);
                $('#descripcionProblemaOrdenPendiente').val(data[0]['DESCRIPCION_PROBLEMA']);

                let imagenes = data[0]['IMAGENES'].split(',')

                for(let i = 0; i < imagenes.length; i++){
                    if(i == 0){
                        $('#carruselOrdenPendiente').append(`
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="http://localhost/order/assets/images/evidencias/${imagenes[i]}"
                                    alt="First slide">
                            </div>
                        `);
                    }
                    $('#carruselOrdenPendiente').append(`
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                src="http://localhost/order/assets/images/evidencias/${imagenes[i]}"
                                alt="First slide">
                        </div>
                    `);
                    
                }
            });
            
        });
    }   


});
