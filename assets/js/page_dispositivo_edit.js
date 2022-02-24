$(document).ready(function () {

    $('#chkSinImagenDispositivoEdit').change(function(e){
        if(this.checked){
            $('#btnUploadDispositivoEdit').attr('disabled',true);
            $('#btnUploadDispositivoEdit').removeClass('btn-gradient-primary');
            $('#btnUploadDispositivoEdit').addClass('btn-gradient-secondary');
        } else {
            $('#btnUploadDispositivoEdit').attr('disabled',false);
            $('#btnUploadDispositivoEdit').removeClass('btn-gradient-secondary');
            $('#btnUploadDispositivoEdit').addClass('btn-gradient-primary');
        }
    });

});