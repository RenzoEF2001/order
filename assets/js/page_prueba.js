$(document).ready(function () {
    $('#botonPrueba').click(function(){
        guardarOrdenAJAX();
    });
    $('#RemplazarPrueba').click(function(){
        $('#imagenRemplazo').val() = $('#imagenPrueba').val();
    })
    function guardarOrdenAJAX(){

        let formData = new FormData();

        for (let index = 0; index < 5; index++) {
            formData.append('imagen[]', $('#imagenPrueba')[0].files[0]);
        }
        
        $.ajax({
            url: 'http://localhost/order/pruebas/prueba2AJAX',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(data){
            alert(data);
        });
    }
});
