$(document).ready(function () {
    $('#idTablaCliente').DataTable({
        "pageLength": 5,
        "scrollX": false,
        "columnDefs": [
            { "width": "5%", "targets": [7, 8, 9] },
            { "width": "1%", "targets": 0 },
        ],
    });
    $('#idTablaCliente_filter').addClass("d-flex justify-content-start");
    $('#idTablaCliente_info').addClass("p-auto");
    //$('.page-item.active .page-link').addClass("colorPagination");
    $('.page-item.active .page-link').css('background-color', '#B66DFF !important');
    /*------------------------------------------------------------------------------*/

    $('.btnVerSucursales').bind('click', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        $.ajax({
            url: 'http://localhost/order/cliente/sucursalesPerClienteAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
            success: function (json) {
                $("#idTablaSucursalModal").empty();
                for (let valor of json) {
                    $("#idTablaSucursalModal").append(`
                        <tr>                           
                            <td>${valor['COD_CLIENTE_SUCURSAL']}</td>
                            <td>${valor['DIRECCION']}</td>
                            <td>${valor['TELEFONO']}</td>
                            <td>${valor['NOMBRE_CONTACTO']}</td>
                            <td>${valor['TELEFONO_CONTACTO']}</td>
                        </tr>
                    `);
                }
                $("#modalClienteView").modal("show");
            },

            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            }
        });
    });

    /*------------------------------------------------------------------------------*/

    $('.btnEliminarCliente').bind('click', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        $.ajax({
            url: 'http://localhost/order/cliente/cantidadSucursalesPerClienteAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
            success: async function (data) {
                let typeDelete;
                let title = "<strong>¿Seguro que quiere eliminar este cliente?</strong>";
                let text = "";

                if (data > 0) {
                    text = `Hay <strong>${data}</strong> sucursales existentes!!!<br>Si elimina este cliente tambien se borrarán sus sucursales.`;
                    typeDelete = "cascada";
                } else {
                    text = "No existe ninguna sucursal de este cliente.<br>¿Desea proceder a eliminar?"
                    typeDelete = "normal";
                }

                let estado = await alertDelete(title, text, codigo);

                if (estado) {
                    if (deleteLogicalCliente(codigo, typeDelete)) {
                        let title = "<strong>Eliminado!</strong>";
                        let text = "Cliente eliminado satisfactoriamente.";
                        let icon = "success"
                        alertStatus(title, text, icon).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                location.reload();
                            }
                        });                      
                    } else {
                        let title = "<strong>Error!!</strong>";
                        let text = "Ocurrio un error al momento de eliminar el cliente.";
                        let icon = "error"
                        alertStatus(title, text, icon).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                return;
                            }
                        });
                    }
                }

            },

            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            }
        });
    });

    /*------------------------------------------------------------------------------*/

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
                //Swal.showLoading()
                timerInterval = setInterval(() => 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        });
    }

    async function deleteLogicalCliente(codigo, typeDelete) {
        let response = await $.ajax({
            url: 'http://localhost/order/cliente/deleteAJAX',
            data: { codigo: codigo, typeDelete: typeDelete },
            type: 'POST',
            dataType: 'json',
        }).done(function(data){
            return data;
        });
    }

});

/*Cambio de prueba */
/*Cambio de prueba 2*/
/*Cambio de prueba 4*/