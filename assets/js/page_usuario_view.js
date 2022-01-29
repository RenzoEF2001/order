$(document).ready(function () {

    $('#idTablaUsuario').DataTable({
        "pageLength": 5,
        "scrollX": false,
        "columnDefs": [
            { "width": "5%", "targets": [3,6,7] },
            { "width": "1%", "targets": 0 }
        ],
        
    });

});