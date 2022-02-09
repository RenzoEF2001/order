$(document).ready(function () {
    let kodotiCache = new KodotiLocalCache('kodoti');

    kodotiCache.delete('detallesOrdenes');

    defaultSelect();

    if ($('#clienteOrdenCreate').val() != null || $('#clienteOrdenCreate').val() != "") {
        let codigo = $('#clienteOrdenCreate').val();
        showSucursales(codigo);
    }

    if (getKodoti('detallesOrdenes').length !== 0) {
        $('#detallesOrdenesOrdenCreate').val('1');
    } else {
        $('#detallesOrdenesOrdenCreate').val('');
    }

    $('#tablaOrdenCreate').DataTable({
        "pageLength": 5,
        "scrollX": false,
        searching: false,
        ordering: false,
        info: false,
        paging: false,
        buttons: [],
        "columnDefs": [
            { "width": "5%", "targets": [5, 6] },
            { "width": "1%", "targets": 0 }
        ],

    });

    $('#clienteOrdenCreate').change(function () {
        let codigo = $('#clienteOrdenCreate').val();

        if (codigo != '-1') {
            showSucursales(codigo);
        } else {
            $('#sucursalesOrdenCreate').empty();
            $('#sucursalesOrdenCreate').append(`<option disabled selected value="-1">Primero seleccione un cliente</option>`);
        }

    });

    $('#comboTipoSistemaOrdenCreate').change(function () {
        let codigo = $('#comboTipoSistemaOrdenCreate').val();

        if (codigo != '-1') {
            showDispositivo(codigo);
        } else {
            $('#comboDispositivoOrdenCreate').empty();
            $('#comboDispositivoOrdenCreate').append(`<option disabled selected value="-1">Primero seleccione un tipo de sistema</option>`);
        }

    });

    $('#btnAgregarTabla').click(function () {
        $('#comboTipoSistemaOrdenCreate').prop("selectedIndex", 0);
        $('#comboDispositivoOrdenCreate').empty();
        $('#comboDispositivoOrdenCreate').append(`<option disabled selected value="-1">Primero seleccione un tipo de sistema</option>`);
        $('#guardarDetalleOrdenCreate').attr('hidden', false);
        $('#actualizarDetalleOrdenCreate').attr('hidden', true);

        $('#alertaOrdenCreate').empty();
        $('#alertaOrdenCreate').attr('hidden', true);
        $('#comboTipoSistemaOrdenCreate').css('border', '');
        $('#comboTipoSistemaOrdenCreate').css('border-color', '');
        $('#lblTipoSistemaOrdenCreate').find("i.mdi.mdi-alert-circle.text-danger:first").remove();
        $('#comboDispositivoOrdenCreate').css('border', '');
        $('#comboDispositivoOrdenCreate').css('border-color', '');
        $('#lblDispositivoOrdenCreate').find("i.mdi.mdi-alert-circle.text-danger:first").remove();

    })

    $('#guardarDetalleOrdenCreate').click(function () {

        let tiposistemaCodigo = $('#comboTipoSistemaOrdenCreate').val();
        let tiposistemaDescripcion = $('#comboTipoSistemaOrdenCreate option:selected').text().trim();
        let dispositivoCodigo = $('#comboDispositivoOrdenCreate').val();
        let dispositivoDescripcion = $('#comboDispositivoOrdenCreate option:selected').text().trim();
        let descripcionProblema = $('#txaDescripcionProblemaOrdenCreate').val();
        let imagen = $('#txtImagenOrdenCreate').val();

        let rules = {
            "tiposistema": {
                "name": "Tipo Sistema",
                "label": $('#lblTipoSistemaOrdenCreate'),
                "field": $('#comboTipoSistemaOrdenCreate'),
                "rules": "required",
                "errors": {
                    "required": "Debe ingresar un tipo de sistema"
                }
            },
            "dispositivo": {
                "name": "Dispositivo",
                "label": $('#lblDispositivoOrdenCreate'),
                "field": $('#comboDispositivoOrdenCreate'),
                "rules": "required",
                "errors": {
                    "required": "Debe ingresar un dispositivo"
                }
            }
        }
        let refvalidator = new RefValidator();
        refvalidator.configuration = rules;

        let status = refvalidator.validation($('#alertaOrdenCreate'));

        if (status) {
            let data = {
                "tiposistema": {
                    "codigo": tiposistemaCodigo,
                    "descripcion": tiposistemaDescripcion
                },
                "dispositivo": {
                    "codigo": dispositivoCodigo,
                    "descripcion": dispositivoDescripcion,
                },
                "descripcionProblema": descripcionProblema,
                "imagen": imagen
            };

            saveLocally(data);
            let detallesOrdenes = getKodoti('detallesOrdenes');
            showRow(detallesOrdenes);
            $('#modalAgregarOrdenCreate').modal("hide");
            $('#detallesOrdenesOrdenCreate').val('1');
        }



    });

    $('#actualizarDetalleOrdenCreate').click(function () {
        let index = $('#indexKodotiOrdenCreate').val();
        let tiposistemaCodigo = $('#comboTipoSistemaOrdenCreate').val();
        let tiposistemaDescripcion = $('#comboTipoSistemaOrdenCreate option:selected').text().trim();
        let dispositivoCodigo = $('#comboDispositivoOrdenCreate').val();
        let dispositivoDescripcion = $('#comboDispositivoOrdenCreate option:selected').text().trim();
        let descripcionProblema = $('#txaDescripcionProblemaOrdenCreate').val();
        let imagen = $('#txtImagenNombreOrdenCreate').val();

        let rules = {
            "tiposistema": {
                "name": "Tipo Sistema",
                "label": $('#lblTipoSistemaOrdenCreate'),
                "field": $('#comboTipoSistemaOrdenCreate'),
                "rules": "required",
                "errors": {
                    "required": "Debe ingresar un tipo de sistema"
                }
            },
            "dispositivo": {
                "name": "Dispositivo",
                "label": $('#lblDispositivoOrdenCreate'),
                "field": $('#comboDispositivoOrdenCreate'),
                "rules": "required",
                "errors": {
                    "required": "Debe ingresar un dispositivo"
                }
            }
        }
        let refvalidator = new RefValidator();
        refvalidator.configuration = rules;

        let status = refvalidator.validation($('#alertaOrdenCreate'));

        if (status) {
            let data = {
                "tiposistema": {
                    "codigo": tiposistemaCodigo,
                    "descripcion": tiposistemaDescripcion
                },
                "dispositivo": {
                    "codigo": dispositivoCodigo,
                    "descripcion": dispositivoDescripcion,
                },
                "descripcionProblema": descripcionProblema,
                "imagen": imagen
            };
            updateLocally(data, index);
            let newData = getKodoti('detallesOrdenes');
            //showDataTable(newData);
            updateRow(data,index);
            $('#modalAgregarOrdenCreate').modal("hide");
        }
    });

    function updateRow(data, index){
        /*--TipoSistema--------*/
        $('#pTipoSistemaDetallesOrdenes'+index).text(data['tiposistema']['descripcion']);
        /*--Dispositivo--------*/
        $('#inputDispositivoDetallesOrdenes'+index).val(data['dispositivo']['codigo']);
        $('#pDispositivoDetallesOrdenes'+index).text(data['dispositivo']['descripcion']);
        /*--Dispositivo--------*/
        $('#inputDescripcionDetallesOrdenes'+index).val(data['descripcionProblema']);
        $('#pDescripcionDetallesOrdenes'+index).text(data['descripcionProblema']);
    }

    function showRow(data) {
        if ($('#tablaOrdenCreate tr .dataTables_empty').length == 1) {
            $('#tablaBodyOrdenCreate').empty();
        }

        let last_row = $('#tablaOrdenCreate tr:last').attr("data-index");
        let indice = 0;

        if(last_row !== undefined){
            indice = Number(last_row);
            indice++;
        }

        let rowCount = $('#tablaOrdenCreate tr').length;
        let rowCount2 = $('#tablaOrdenCreate tr').length;

        for (let index = rowCount - 1; index < data.length; index++) {
            $('#tablaBodyOrdenCreate').append(`
                <tr class="indice-tabla" data-index="${indice}">
                    <td class="indice">${rowCount2}</td>
                    <td><p class="pTipoSistemaDetallesOrdenes m-0" id="pTipoSistemaDetallesOrdenes${index}">${data[index]['tiposistema']['descripcion']}</p></td>
                    <td><input id="inputDispositivoDetallesOrdenes${indice}" type="text" name="detallesOrdenes${indice}[]" value="${data[index]['dispositivo']['codigo']}" hidden>
                        <p class="pDispositivoDetallesOrdenes m-0" id="pDispositivoDetallesOrdenes${indice}">${data[index]['dispositivo']['descripcion']}</p></td>
                    <td><input id="inputDescripcionDetallesOrdenes${indice}" type="text" name="detallesOrdenes${indice}[]" value="${data[index]['descripcionProblema']}" hidden>
                        <p class="pDescripcionDetallesOrdenes m-0" style="max-width: 150px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" id="pDescripcionDetallesOrdenes${indice}">${data[index]['descripcionProblema']}</p></td>
                    <td><input type="file" name="imagen${indice}[]" multiple></td>
                    <td class="text-center"><a style="cursor:pointer" id="btnEditarOrdenCreate${indice}" class="btnEditarOrdenCreate" data-index="${index}"><i class="fas fa-edit text-info"></i></a></td>
                    <td class="text-center"><a style="cursor:pointer" id="btnBorrarOrdenCreate${indice}" class="btnBorrarOrdenCreate" data-index="${index}"><i class="fas fa-trash text-danger"></i></a></td>
                </tr>
            `);
            indice++;
            rowCount2++;
        }

        
        

    }

    function updateDataTable(){
        for(let j = 1; j < $('#tablaOrdenCreate tr').length; j++){
            let tr = $('#tablaOrdenCreate').find("tr:eq("+j+")");
            tr.attr("data-index",(j-1))
            for(let i = 0; i < $('#tablaOrdenCreate tr th').length; i++){
                let fila = $('#tablaOrdenCreate').find("tr:eq("+j+") td:eq("+i+")");
                if(i == 0) fila.text(j);
                if(i == 1){
                    id = 'pTipoSistemaDetallesOrdenes' + (j - 1);
                    fila.children('.pTipoSistemaDetallesOrdenes').attr("id",id);
                }
                if(i == 2){
                    let id_input = "inputDispositivoDetallesOrdenes" + (j - 1);
                    let id_p = "pDispositivoDetallesOrdenes" + (j - 1);
                    let name_input = ("detallesOrdenes"+(j - 1))+"[]";
                    fila.find(':text').attr("id", id_input);
                    fila.find(':text').attr("name", name_input);
                    fila.children('.pDispositivoDetallesOrdenes').attr("id", id_p);
                }
                if(i == 3){
                    let id_input = "inputDescripcionDetallesOrdenes" + (j - 1);
                    let id_p = "pDescripcionDetallesOrdenes" + (j - 1);
                    let name_input = ("detallesOrdenes"+(j - 1))+"[]";
                    fila.find(':text').attr("id", id_input);
                    fila.find(':text').attr("name",name_input);
                    fila.children('.pDescripcionDetallesOrdenes').attr("id", id_p);
                }
                if(i == 4){
                    let name_image = ("imagen"+(j - 1))+"[]";
                    fila.find(':input').attr("name", name_image);
                }
                if(i == 5){
                    let id_a = "btnEditarOrdenCreate"+(j - 1);
                    fila.find('a').attr("id", id_a);
                    fila.find('a').attr("data-index",(j - 1));
                }
                if(i == 6){
                    let id_a = "btnBorrarOrdenCreate"+(j - 1);
                    fila.find('a').attr("id", id_a);
                    fila.find('a').attr("data-index",(j - 1));
                }   
                
            }
        }  
    }

    function showDispositivo(codigo, selected = null) {
        $.ajax({
            url: 'http://localhost/order/orden/getDispositivoPerTiposistemaAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json'
        }).done(function (data) {
            $('#comboDispositivoOrdenCreate').empty();
            $('#comboDispositivoOrdenCreate').append(`<option value="-1">Seleccione un dispositivo</option>`);
            for (let valor of data) {
                $("#comboDispositivoOrdenCreate").append(`
                    <option value="${valor['COD_DISPOSITIVO']}">${valor['NOMBRE']}</option>
                `);
            }
            if (selected != null) {
                $('#comboDispositivoOrdenCreate').prop("value", selected);
            } else {
                $('#comboDispositivoOrdenCreate').prop("value", -1);
            }
        });
    }

    function showSucursales(codigo) {
        $.ajax({
            url: 'http://localhost/order/orden/getSucursalesPerClienteAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json'
        }).done(function (data) {
            $('#sucursalesOrdenCreate').empty();
            $('#sucursalesOrdenCreate').append(`<option selected value="">Seleccione una sucursal</option>`);
            for (let valor of data) {
                $("#sucursalesOrdenCreate").append(`
                    <option value="${valor['COD_CLIENTE_SUCURSAL']}">${valor['DIRECCION']}</option>
                `);
            }
        });
    }

    $('#tablaBodyOrdenCreate').on('click', 'a.btnBorrarOrdenCreate', function (e) {
        target = e.currentTarget;
        let index = target.dataset.index;
        removeLocally(index);
        let data = getKodoti('detallesOrdenes');
        $(this).parent().parent().remove();

        updateDataTable();

        if (getKodoti('detallesOrdenes').length == 0) {
            $('#detallesOrdenesOrdenCreate').val('');
        }
    })

    $('#tablaBodyOrdenCreate').on('click', 'a.btnEditarOrdenCreate', function (e) {
        $('#alertaOrdenCreate').empty();
        $('#alertaOrdenCreate').attr('hidden', true);
        $('#comboTipoSistemaOrdenCreate').css('border', '');
        $('#comboTipoSistemaOrdenCreate').css('border-color', '');
        $('#lblTipoSistemaOrdenCreate').find("i.mdi.mdi-alert-circle.text-danger:first").remove();
        $('#comboDispositivoOrdenCreate').css('border', '');
        $('#comboDispositivoOrdenCreate').css('border-color', '');
        $('#lblDispositivoOrdenCreate').find("i.mdi.mdi-alert-circle.text-danger:first").remove();

        target = e.currentTarget;
        let index = target.dataset.index;
        let data = getKodoti('detallesOrdenes');

        $('#guardarDetalleOrdenCreate').attr('hidden', true);
        $('#actualizarDetalleOrdenCreate').attr('hidden', false);

        if (data[index] == undefined) {
            return;
        }
        let rules = {
            "tiposistema": {
                "name": "Tipo Sistema",
                "label": $('#lblTipoSistemaOrdenCreate'),
                "field": $('#comboTipoSistemaOrdenCreate'),
                "rules": "required",
                "errors": {
                    "required": "Debe ingresar un tipo de sistema"
                }
            },
            "dispositivo": {
                "name": "Dispositivo",
                "label": $('#lblDispositivoOrdenCreate'),
                "field": $('#comboDispositivoOrdenCreate'),
                "rules": "required",
                "errors": {
                    "required": "Debe ingresar un dispositivo"
                }
            }
        }


        let refvalidator = new RefValidator();
        refvalidator.configuration = rules;
        refvalidator.errorConteiner = $('#alertaOrdenCreate');

        $('#indexKodotiOrdenCreate').val(index);
        $('#comboTipoSistemaOrdenCreate').prop("value", data[index]['tiposistema']['codigo']);
        showDispositivo(data[index]['tiposistema']['codigo'], data[index]['dispositivo']['codigo']);
        $('#txaDescripcionProblemaOrdenCreate').val(data[index]['descripcionProblema']);
        $('#modalAgregarOrdenCreate').modal("show");
    })



    function updateLocally(data, index) {
        let dataKodoti = getKodoti('detallesOrdenes');
        dataKodoti[index] = data;
        saveKodoti("detallesOrdenes", dataKodoti);
    }

    function removeLocally(index) {
        let dataKodoti = getKodoti('detallesOrdenes');
        dataKodoti.splice(index, 1)
        saveKodoti('detallesOrdenes', dataKodoti);
    }

    function saveLocally(data) {
        let detallesOrdenes = getKodoti('detallesOrdenes');

        detallesOrdenes.push(data);
        saveKodoti('detallesOrdenes', detallesOrdenes)

        let ver = getKodoti('detallesOrdenes');
    }

    function defaultSelect() {
        $('#comboTipoSistemaOrdenCreate').prop("selectedIndex", 0);
        $('#comboDispositivoOrdenCreate').prop("selectedIndex", 0);
    }

    function getKodoti(name) {
        let data = JSON.parse(kodotiCache.get(name));
        if (data === null) {
            data = [];
        }
        return data;
    }

    function saveKodoti(name, data) {
        kodotiCache.add(name, JSON.stringify(data), { type: KodotiLocalCache.TIMETYPE.MINUTES, value: 30 });
    }

});

