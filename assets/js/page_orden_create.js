$(document).ready(function () {
    let kodotiCache = new KodotiLocalCache('kodoti');
    let refvalidator = new RefValidator();

    showDataTable(getKodoti('detallesOrdenes'));

    defaultSelect();

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

    $('#guardarOrdenCreate').click(function(){
        let tiposistemaCodigo = $('#comboTipoSistemaOrdenCreate').val();
        let tiposistemaDescripcion = $('#comboTipoSistemaOrdenCreate option:selected').text().trim();
        let dispositivoCodigo = $('#comboDispositivoOrdenCreate').val();
        let dispositivoDescripcion = $('#comboDispositivoOrdenCreate option:selected').text().trim();
        let descripcionProblema = $('#txaDescripcionProblemaOrdenCreate').val();
        let imagen = $('#txtImagenNombreOrdenCreate').val();
        let validaciones = {
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
        let status = refvalidator.validation(validaciones, $('#alertaOrdenCreate'));
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
        }
        
        
        
    });

    function saveLocally(data){
        let detallesOrdenes = getKodoti('detallesOrdenes');
        
        detallesOrdenes.push(data);
        addKodoti('detallesOrdenes', detallesOrdenes)

        let ver = getKodoti('detallesOrdenes');
        console.log(ver);
    }

    function showDataTable(data){
        $('#tablaBodyOrdenCreate').empty();
        let cont = 0;
        for(let valor of data){
            $('#tablaBodyOrdenCreate').append(`
                <tr>
                    <td>${++cont}</td>
                    <td>${valor['tiposistema']['descripcion']}</td>
                    <td><input type="text" name="detallesOrdenes[]" value="${valor['dispositivo']['codigo']}" hidden>${valor['dispositivo']['descripcion']}</td>
                    <td><input type="text" name="detallesOrdenes[]" value="${valor['descripcionProblema']}" hidden>${valor['descripcionProblema']}</td>
                    <td hidden><input type="text" name="detallesOrdenes[]" style="border: none; background-color: transparent" value="${valor['imagen']}" hidden></td>
                    <td class="text-center"><a style="cursor:pointer" class="btnEditarOrdenCreate" data-index="${cont - 1}"><i class="fas fa-edit text-info"></i></a></td>
                    <td class="text-center"><a style="cursor:pointer" class="btnBorrarOrdenCreate"><i class="fas fa-trash text-danger"></i></a></td>
                </tr>
            `);
        }
        generateEvent();
    }

    function showSucursales(codigo) {
        $.ajax({
            url: 'http://localhost/order/orden/getSucursalesPerClienteAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json'
        }).done(function (data) {
            $('#sucursalesOrdenCreate').empty();
            $('#sucursalesOrdenCreate').append(`<option selected value="-1">Seleccione una sucursal</option>`);
            for (let valor of data) {
                $("#sucursalesOrdenCreate").append(`
                    <option value="${valor['COD_CLIENTE_SUCURSAL']}">${valor['DIRECCION']}</option>
                `);
            }
        });
    }

    function showDispositivo(codigo) {
        $.ajax({
            url: 'http://localhost/order/orden/getDispositivoPerTiposistemaAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json'
        }).done(function (data) {
            $('#comboDispositivoOrdenCreate').empty();
            $('#comboDispositivoOrdenCreate').append(`<option selected value="-1">Seleccione un dispositivo</option>`);
            for (let valor of data) {
                $("#comboDispositivoOrdenCreate").append(`
                    <option value="${valor['COD_DISPOSITIVO']}">${valor['NOMBRE']}</option>
                `);
            }
        });
    }

    function generateEvent(){
        $('.btnEditarOrdenCreate').bind('click', function (e) {
            target = e.currentTarget;
            let index = target.dataset.index;
            let data = getKodoti('detallesOrdenes');

            if(data[index] == undefined){
                return;
            }
        });
    }

    function defaultSelect(){
        $('select').prop("selectedIndex",0);
    }

    function getKodoti(name){
        let data = JSON.parse(kodotiCache.get(name));
        if (data === null) {
            data = [];
        }
        return data;
    }

    function addKodoti(name, data){
        kodotiCache.add(name, JSON.stringify(data), { type: KodotiLocalCache.TIMETYPE.MINUTES, value: 30 });
    }

});