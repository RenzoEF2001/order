$(document).ready(function () {
    let tablaOrdenReporte;
    tablaOrdenReporte = $('#tablaOrdenReporte').DataTable({
        "pageLength": 7,
        "scrollX": false,
        responsive: true,
        searching: false,
        info: false,
        "columnDefs": [
            { "width": "1%", "targets": 0 },
            { "width": "50%", "targets": 6 },
        ],
        "dom": 'ft<"d-flex d-flex justify-content-between p-4"pB>',
        
    });

    $('#tablaModalOrdenReporte').DataTable({
        "pageLength": 5,
        "scrollX": false,
        responsive: true,
        paging: false,
        searching: false,
        ordering:  false,
        info: false,
        "columnDefs": [
            { "width": "1%", "targets": 0 },
        ],
        "dom": 'ft<"d-flex d-flex justify-content-between p-4"pB>',
        
    });

    $('#cboEstadoOrdenReporte').val('')

    $('#cboEstadoOrdenReporte').change(function(){
        getData();
    });

    $('#cboTecnicoOrdenReporte').change(function(){
        getData();
    });

    $('#cboFechaOrdenReporte').change(function(){
        getData();
    });

    function getData(){
        let estado = $('#cboEstadoOrdenReporte').val() == -1 ? null : $('#cboEstadoOrdenReporte').val();
        let empleado = $('#cboTecnicoOrdenReporte').val() == -1 ? null : $('#cboTecnicoOrdenReporte').val();
        let fecha = $('#cboFechaOrdenReporte').val() == -1 ? null : $('#cboFechaOrdenReporte').val();

        $.ajax({
            url: 'http://localhost/order/orden/getAllFilterAjax',
            data: { estado: estado, empleado: empleado, fecha:fecha },
            type: 'POST',
            dataType: 'json',
        }).done(function(data){
            let cont = 0
            for(let valor of data){

                if(valor['ESTADO_ORDEN'] == 1){
                    data[cont]['ESTADO_ORDEN'] = `<td class="text-center"><label class="text-black-50 font-weight-bold badge badge-danger">CREADA</label></td>`;
                }
                if(valor['ESTADO_ORDEN'] == 2){
                    data[cont]['ESTADO_ORDEN'] = `<td class="text-center"><label class="text-black-50 font-weight-bold badge badge-warning">PENDIENTE</label></td>`;
                }
                if(valor['ESTADO_ORDEN'] == 3){
                    data[cont]['ESTADO_ORDEN'] = `<td class="text-center"><label class="text-black-50 font-weight-bold badge badge-success">TRABAJANDO</label></td>`;
                }
                if(valor['ESTADO_ORDEN'] == 4){
                    data[cont]['ESTADO_ORDEN'] = `<td class="text-center"><label class="text-black-50 font-weight-bold badge badge-info">ATENDIDA</label></td>`;
                }
                if(valor['ESTADO_ORDEN'] == 5){
                    data[cont]['ESTADO_ORDEN'] = `<td class="text-center"><label class="text-black-50 font-weight-bold badge badge-secondary">CERRADA</label></td>`;
                }
                let boton = {
                    "BOTON_VERDETALLES" : `<td class="text-center"><button type="button" class="btnDetallesOrdenReporte btn btn-outline btn-rounded btn-icon" data-codigo="${valor['COD_ORDEN']}"><i class="mdi mdi-library-books mdi-18px text-info"></i></button></td>`
                };
                let tecnico = {
                    "TECNICO" : valor['FK_EMPLEADO'] == null ? 'No asignado' : valor['NOMBRES'] + " " + valor["APELLIDOS"] 
                };
                let objFinal = Object.assign(boton, valor, tecnico);
                data[cont] = objFinal;
                cont++;
            }

            tablaOrdenReporte =  $('#tablaOrdenReporte').DataTable({
                "destroy": true,
                "pageLength": 5,
                "scrollX": false,
                searching: false,
                ordering:  false,
                info: false,
                responsive: true,
                "dom": 'ft<"d-flex d-flex justify-content-between p-4"pB>',
                "data": data,
                "columns":[
                    {"data" : null},
                    {"data" : "BOTON_VERDETALLES"},
                    {"data" : "ESTADO_ORDEN"},
                    {"data" : "COD_ORDEN"},
                    {"data" : "FECHA_ORDEN"},
                    {"data" : "HORA_ORDEN"},
                    {"data" : "ASUNTO"},
                    {"data" : "RAZON_SOCIAL"},
                    {"data" : "DIRECCION_SUCURSAL"},
                    {"data" : "TECNICO"}
                ],
                "columnDefs": [
                    { "width": "1%", "targets": [0,1] },
                    { "className": "text-center", "targets": 1 },
                    { "className": "text-center", "targets": 2 },
                    { "className": "cellEllipsis", "targets": 6},
                    { "className": "cellEllipsis", "targets": 7 },
                    { "targets": 0, "data": null, "defaultContent": "" },
                ],
            });
        });
    }

    $('#tablaOrdenReporte').on('click', "button.btnDetallesOrdenReporte",function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        $('#codigoOrdenReporte').text(codigo);
        $('#codigoOrdenReporte').attr("data-codigo",codigo);
        $('#modalOrdenReporte').modal('show');

        $.ajax({
            url: 'http://localhost/order/orden/getOrdenDetallePerOrdenAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
        }).done(function(data){
            $('#tablaModalBodyOrdenReporte').empty();
            let cont = 0;

            $('#codigoOrdenReporte').text('CODIGO ORDEN: ' + data['orden'][0]['COD_ORDEN']);

            $('#tablaModalOrdenReporte').DataTable({
                "destroy": true,
                "pageLength": 5,
                "scrollX": false,
                responsive: true,
                paging: false,
                searching: false,
                ordering:  false,
                info: false,
                "data": data['ordendetalle'],
                "columns": [
                    {"data" : "COD_ORDEN_DETALLE"},
                    {"data" : "DESCRIPCION"},
                    {"data" : "NOMBRE"},
                    {"data" : "DESCRIPCION_PROBLEMA"},
                ],
                "columnDefs": [
                    { "width": "1%", "targets": 0 },
                ],
                "dom": 'ft<"d-flex d-flex justify-content-between p-4"pB>',
                
            });
            /*
            for(let valor of data['ordendetalle']){
                $('#tablaModalBodyOrdenReporte').append(`
                    <tr>
                        <td>${valor['COD_ORDEN_DETALLE']}</td>
                        <td>${valor['DESCRIPCION']}</td>
                        <td>${valor['NOMBRE']}</td>
                        <td>${valor['DESCRIPCION_PROBLEMA']}</td>
                        
                        <td class="text-center"><button type="button" class="btnDetalles2OrdenReporte btn btn-outline btn-rounded btn-icon" data-codigo="${valor['COD_ORDEN_DETALLE']}"><i class="mdi mdi-library-books mdi-18px text-info"></i></button></td>
                    </tr>
                `);
            }
            */
            $('#modalOrdenReporte').modal('show');
        });

    });

    function stripHtml(html){
        var temporalDivElement = document.createElement("div");
        temporalDivElement.innerHTML = html;
        return temporalDivElement.textContent || temporalDivElement.innerText || "";
    }

});