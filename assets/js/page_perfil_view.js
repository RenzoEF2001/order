$(document).ready(function () {

    $('#idTablaPerfil').DataTable({
        "pageLength": 5,
        "scrollX": false,
        buttons: [],
        "columnDefs": [
            { "width": "5%", "targets": [0] },
            { "width": "25%", "targets": [1] },
            { "width": "1%", "targets": [2] }
        ]
    });

});