$(document).ready(function () {

    $('#idTablaUsuario').DataTable({
        "pageLength": 5,
        "scrollX": false,
        "columnDefs": [
            { "width": "5%", "targets": [5,6] },
            { "width": "1%", "targets": 0 }
        ],
        
    });

});