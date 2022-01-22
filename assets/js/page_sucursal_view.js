$(document).ready(function () {

    $('#idTablaSucursal').DataTable({
        "pageLength": 5,
        "scrollX": false,
        "columnDefs": [
            { "width": "5%", "targets": [7,8] },
            { "width": "1%", "targets": 0 }
        ],
    });
    $('#idTablaSucursal_filter').addClass("d-flex justify-content-start");
    $('#idTablaSucursal_info').addClass("p-auto");

});