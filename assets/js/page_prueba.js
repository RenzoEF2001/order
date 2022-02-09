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
            formData.append('imagen[]', $('#imagenPrueba')[0].files[index]);
        }
    
        $.ajax({
            url: 'http://localhost/order/pruebas/pruebaAJAX',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(data){
            console.log(data);
        });
    }
});
