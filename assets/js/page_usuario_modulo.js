$(document).ready(function () {

    $('#idTablaModulo').DataTable({
        "pageLength": 5,
        "scrollX": false,
        buttons: [],
        "columnDefs": [
            { "width": "5%", "targets": [4,5] },
            { "width": "1%", "targets": [0] }
        ]
    });

});