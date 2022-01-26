$(document).ready(function () {
    let kodotiCache = new KodotiLocalCache('kodoti');
    

    

    showDataTable(getKodoti('detallesOrdenes'));

    defaultSelect();

    if( $('#clienteOrdenCreate').val() != null || $('#clienteOrdenCreate').val() != ""){
        let codigo = $('#clienteOrdenCreate').val();
        showSucursales(codigo);
    }

    if(getKodoti('detallesOrdenes').length !== 0){
        console.log('hay datos en kodoti', getKodoti('detallesOrdenes').length );
        $('#detallesOrdenesOrdenCreate').val('1');
    } else {
        console.log('NO hay datos en kodoti');
        $('#detallesOrdenesOrdenCreate').val('');
    }

    $('#tablaOrdenCreate').DataTable({
        "pageLength": 5,
        "scrollX": false,
        searching: false,
        ordering:  false,
        info: false,
        paging: false,
        buttons: [],
        "columnDefs": [
            { "width": "5%", "targets": [5,6] },
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

    $('#btnAgregarTabla').click(function(){
        $('#comboTipoSistemaOrdenCreate').prop("selectedIndex",0);
        $('#comboDispositivoOrdenCreate').empty();
        $('#comboDispositivoOrdenCreate').append(`<option disabled selected value="-1">Primero seleccione un tipo de sistema</option>`);
        $('#guardarOrdenCreate').attr('hidden',false);
        $('#actualizarOrdenCreate').attr('hidden',true);

        $('#alertaOrdenCreate').empty();
        $('#alertaOrdenCreate').attr('hidden',true);
        $('#comboTipoSistemaOrdenCreate').css('border', '');
        $('#comboTipoSistemaOrdenCreate').css('border-color', '');
        $('#lblTipoSistemaOrdenCreate').find("i.mdi.mdi-alert-circle.text-danger:first").remove();
        $('#comboDispositivoOrdenCreate').css('border', '');
        $('#comboDispositivoOrdenCreate').css('border-color', '');
        $('#lblDispositivoOrdenCreate').find("i.mdi.mdi-alert-circle.text-danger:first").remove();

    })

    $('#guardarOrdenCreate').click(function(){

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
                "field" : $('#comboTipoSistemaOrdenCreate'),
                "rules" : "required",
                "errors" : {
                    "required" : "Debe ingresar un tipo de sistema"
                }
            },
            "dispositivo" : {
                "name" : "Dispositivo",
                "label": $('#lblDispositivoOrdenCreate'),
                "field" : $('#comboDispositivoOrdenCreate'),
                "rules" : "required",
                "errors" : {
                    "required" : "Debe ingresar un dispositivo"
                }
            }
        }
        let refvalidator = new RefValidator();
        refvalidator.configuration = rules;
        
        let status = refvalidator.validation($('#alertaOrdenCreate'));

        if(status){
            let data = {
                "tiposistema":{
                    "codigo" : tiposistemaCodigo,      
                    "descripcion" : tiposistemaDescripcion      
                },
                "dispositivo":{
                    "codigo" : dispositivoCodigo,
                    "descripcion" : dispositivoDescripcion,
                },
                "descripcionProblema" : descripcionProblema,
                "imagen" : imagen
            };
    
            saveLocally(data);
            let detallesOrdenes = getKodoti('detallesOrdenes');
            showDataTable(detallesOrdenes);
            $('#modalAgregarOrdenCreate').modal("hide");
            $('#detallesOrdenesOrdenCreate').val('1');
        }
        
        
        
    });

    $('#actualizarOrdenCreate').click(function(){
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
                "field" : $('#comboTipoSistemaOrdenCreate'),
                "rules" : "required",
                "errors" : {
                    "required" : "Debe ingresar un tipo de sistema"
                }
            },
            "dispositivo" : {
                "name" : "Dispositivo",
                "label": $('#lblDispositivoOrdenCreate'),
                "field" : $('#comboDispositivoOrdenCreate'),
                "rules" : "required",
                "errors" : {
                    "required" : "Debe ingresar un dispositivo"
                }
            }
        }
        let refvalidator = new RefValidator();
        refvalidator.configuration = rules;

        let status = refvalidator.validation($('#alertaOrdenCreate'));

        if(status){
            let data = {
                "tiposistema":{
                    "codigo" : tiposistemaCodigo,      
                    "descripcion" : tiposistemaDescripcion      
                },
                "dispositivo":{
                    "codigo" : dispositivoCodigo,
                    "descripcion" : dispositivoDescripcion,
                },
                "descripcionProblema" : descripcionProblema,
                "imagen" : imagen
            };
            updateLocally(data, index);
            let newData = getKodoti('detallesOrdenes');
            showDataTable(newData);
            $('#modalAgregarOrdenCreate').modal("hide");
        }
    });

    function showDataTable(data){
        $('#tablaBodyOrdenCreate').empty();
        let cont = 0;
        for(let valor of data){
            $('#tablaBodyOrdenCreate').append(`
                <tr>
                    <td>${++cont}</td>
                    <td>${valor['tiposistema']['descripcion']}</td>
                    <td><input type="text" name="detallesOrdenes${cont - 1}[]" value="${valor['dispositivo']['codigo']}" hidden>${valor['dispositivo']['descripcion']}</td>
                    <td><input type="text" name="detallesOrdenes${cont - 1}[]" value="${valor['descripcionProblema']}" hidden>${valor['descripcionProblema']}</td>
                    <td hidden><input type="text" name="detallesOrdenes${cont - 1}[]" style="border: none; background-color: transparent" value="${valor['imagen']}" hidden></td>
                    <td class="text-center"><a style="cursor:pointer" class="btnEditarOrdenCreate" data-index="${cont - 1}"><i class="fas fa-edit text-info"></i></a></td>
                    <td class="text-center"><a style="cursor:pointer" class="btnBorrarOrdenCreate" data-index="${cont - 1}"><i class="fas fa-trash text-danger"></i></a></td>
                </tr>
            `);
        }
        generateEvent();
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
            if(selected != null){
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

    function generateEvent(){
        $('.btnEditarOrdenCreate').bind('click', function(e) {

            $('#alertaOrdenCreate').empty();
            $('#alertaOrdenCreate').attr('hidden',true);
            $('#comboTipoSistemaOrdenCreate').css('border', '');
            $('#comboTipoSistemaOrdenCreate').css('border-color', '');
            $('#lblTipoSistemaOrdenCreate').find("i.mdi.mdi-alert-circle.text-danger:first").remove();
            $('#comboDispositivoOrdenCreate').css('border', '');
            $('#comboDispositivoOrdenCreate').css('border-color', '');
            $('#lblDispositivoOrdenCreate').find("i.mdi.mdi-alert-circle.text-danger:first").remove();

            target = e.currentTarget;
            let index = target.dataset.index;
            let data = getKodoti('detallesOrdenes');

            $('#guardarOrdenCreate').attr('hidden',true);
            $('#actualizarOrdenCreate').attr('hidden',false);

            if(data[index] == undefined){
                return;
            }
            let rules = {
                "tiposistema": {
                    "name": "Tipo Sistema",
                    "label": $('#lblTipoSistemaOrdenCreate'),
                    "field" : $('#comboTipoSistemaOrdenCreate'),
                    "rules" : "required",
                    "errors" : {
                        "required" : "Debe ingresar un tipo de sistema"
                    }
                },
                "dispositivo" : {
                    "name" : "Dispositivo",
                    "label": $('#lblDispositivoOrdenCreate'),
                    "field" : $('#comboDispositivoOrdenCreate'),
                    "rules" : "required",
                    "errors" : {
                        "required" : "Debe ingresar un dispositivo"
                    }
                }
            }
            

            let refvalidator = new RefValidator();
            refvalidator.configuration = rules;
            refvalidator.errorConteiner = $('#alertaOrdenCreate');

            $('#indexKodotiOrdenCreate').val(index);
            $('#comboTipoSistemaOrdenCreate').prop("value",data[index]['tiposistema']['codigo']);
            showDispositivo(data[index]['tiposistema']['codigo'], data[index]['dispositivo']['codigo']);
            $('#txaDescripcionProblemaOrdenCreate').val( data[index]['descripcionProblema']);
            $('#modalAgregarOrdenCreate').modal("show");
        });
        $('.btnBorrarOrdenCreate').bind('click', function(e){
            target = e.currentTarget;
            let index = target.dataset.index;
            removeLocally(index);
            let data = getKodoti('detallesOrdenes');
            showDataTable(data);
            if(getKodoti('detallesOrdenes').length == 0){
                $('#detallesOrdenesOrdenCreate').val('');
            }
        });
        
    }

    

    function updateLocally(data, index){
        let dataKodoti = getKodoti('detallesOrdenes');
        dataKodoti[index] = data;
        saveKodoti("detallesOrdenes",dataKodoti);
    }

    function removeLocally(index){
        let dataKodoti = getKodoti('detallesOrdenes');
        dataKodoti.splice(index,1)
        saveKodoti('detallesOrdenes', dataKodoti);
    }

    function saveLocally(data){
        let detallesOrdenes = getKodoti('detallesOrdenes');
        
        detallesOrdenes.push(data);
        saveKodoti('detallesOrdenes', detallesOrdenes)

        let ver = getKodoti('detallesOrdenes');
    }

    function defaultSelect(){
        $('#comboTipoSistemaOrdenCreate').prop("selectedIndex",0);
        $('#comboDispositivoOrdenCreate').prop("selectedIndex",0);
    }

    function getKodoti(name){
        let data = JSON.parse(kodotiCache.get(name));
        if (data === null) {
            data = [];
        }
        return data;
    }

    function saveKodoti(name, data){
        kodotiCache.add(name, JSON.stringify(data), { type: KodotiLocalCache.TIMETYPE.MINUTES, value: 30 });
    }

    

});