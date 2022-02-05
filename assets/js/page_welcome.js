$(document).ready(function () {

    $('#btnCerrarSesion').click(async function () {
        let title = 'Cerrar Sesion';
        let text = '¿Desea salir de la sesion?';
        let status = await alertSweet(title, text);
        if (status) {
            $.ajax({
                url: 'http://localhost/order/Welcome/logout',
            }).done(function () {
                location.reload();
            });
        }
    })

    $('#divCreadaReporte').click(function () { location.href = "http://localhost/order/orden/ordenesCreadas" });
    $('#divPendienteReporte').click(function () { location.href = "http://localhost/order/orden/ordenesPendientes" });
    $('#divProcesoReporte').click(function () { location.href = "http://localhost/order/orden/ordenesPendientes" });

    function alertSweet(title, text) {
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
            confirmButtonText: '<strong>Si</strong>',
            cancelButtonText: '<strong>No</strong>',
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
});

