$(document).ready(function () {
    $('#idTablaEmpleado').DataTable({
        "pageLength": 5,
        "scrollX": false,
        "columnDefs": [
            { "width": "5%", "targets": [5,6] },
            { "width": "1%", "targets": 0 }
        ],
        
    });

    $('#idTablaEmpleado_filter').addClass("d-flex justify-content-start");
    $('#idTablaEmpleado_info').addClass("p-auto");

    $('#paso2Empleado').css('display',"none");
    $('#btnCrearEmpleado').attr('disabled',true);

    $('#btnContinuarEmpleado').click(function(){
        $('#btnAtrasEmpleado').attr('hidden',false);
        $('#btnContinuarEmpleado').attr('hidden',true);
        $('#paso1Empleado').css('display',"none");
        $('#paso2Empleado').css('display',"block");
        $('#btnCrearEmpleado').attr('disabled',false);
    });

    $('#btnAtrasEmpleado').click(function(){
        $('#btnAtrasEmpleado').attr('hidden',true);
        $('#btnContinuarEmpleado').attr('hidden',false);
        $('#paso1Empleado').css('display',"block");
        $('#paso2Empleado').css('display',"none");
        $('#btnCrearEmpleado').attr('disabled',true);
    });

    $('.btnEliminarEmpleado').bind('click', function (e) {
        target = e.currentTarget;
        let codigo = target.dataset.codigo;
        $.ajax({
            url: 'http://localhost/order/empleado/cantidadUsuariosPerEmpleadoAJAX',
            data: { codigo: codigo },
            type: 'POST',
            dataType: 'json',
            success: async function (data) {
                let typeDelete;
                let title = "<strong>¿Seguro que quiere eliminar este empleado?</strong>";
                let text = "";

                if (data > 0) {
                    text = `Hay un usuario registrado para este empleado!!!<br>Si elimina este empleado tambien se borrará su usuario.`;
                    typeDelete = "cascada";
                } else {
                    text = "No existe ningun usuario registrado para este empleado.<br>¿Desea proceder a eliminar?"
                    typeDelete = "normal";
                }

                let estado = await alertDelete(title, text, codigo);

                if (estado) {
                    if (deleteLogicalCliente(codigo, typeDelete)) {
                        let title = "<strong>Eliminado!</strong>";
                        let text = "Empleado eliminado satisfactoriamente.";
                        let icon = "success"
                        alertStatus(title, text, icon).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                location.reload();
                            }
                        });                      
                    } else {
                        let title = "<strong>Error!!</strong>";
                        let text = "Ocurrio un error al momento de eliminar el empleado.";
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
            /*
            willClose: () => {
                clearInterval(timerInterval)
            }
            */
        });
    }

    async function deleteLogicalCliente(codigo, typeDelete) {
        let response = await $.ajax({
            url: 'http://localhost/order/empleado/deleteAJAX',
            data: { codigo: codigo, typeDelete: typeDelete },
            type: 'POST',
            dataType: 'json',
        }).done(function(data){
            return data;
        });
    }

    

});
/*
let btnContinuar = document.getElementById("btnContinuar");
let btnAtras = document.getElementById("btnAtras");
let btnCrear = document.getElementById("btnCrear");
let paso1 = document.getElementById("paso1");
let paso2 = document.getElementById("paso2");

window.onload = function() {
    paso2.style = "display: none";
    btnCrear.disabled = true;
};

btnContinuar.addEventListener("click", e => {
    btnAtras.hidden = false;
    btnContinuar.hidden = true;
    paso1.style = "display: none";
    paso2.style = "display: block";
    btnCrear.disabled = false;
});

btnAtras.addEventListener("click", e => {
    btnAtras.hidden = true;
    btnContinuar.hidden = false;
    paso1.style = "display: block";
    paso2.style = "display: none";
    btnCrear.disabled = true;
});
*/
