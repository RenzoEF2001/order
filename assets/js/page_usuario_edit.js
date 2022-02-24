$(document).ready(function () {

    $('#chkSinFotoUsuarioEdit').prop("checked",false);

    $('#btnOjoUsuarioEdit').click(function(e){
        console.log($('#btnOjoUsuarioEdit.no-eye'));
        console.log($('#btnOjoUsuarioEdit.eye'));
        
        if($('#btnOjoUsuarioEdit.no-eye').length == 1){
            $('#inputContraseñaUsuarioEdit').attr('type','text');
            $('#icoOjoUsuarioEdit').removeClass('mdi mdi-eye-off');
            $('#icoOjoUsuarioEdit').addClass('mdi mdi-eye');
            $('#btnOjoUsuarioEdit').removeClass('no-eye');
            $('#btnOjoUsuarioEdit').addClass('eye');
            $('#btnOjoUsuarioEdit').removeClass('no-eye');
            return;
        }
        if($('#btnOjoUsuarioEdit.eye').length == 1){
            $('#inputContraseñaUsuarioEdit').attr('type','password');
            $('#icoOjoUsuarioEdit').removeClass('mdi mdi-eye');
            $('#icoOjoUsuarioEdit').addClass('mdi mdi-eye-off');
            $('#btnOjoUsuarioEdit').removeClass('eye');
            $('#btnOjoUsuarioEdit').addClass('no-eye');
            return;
        }
    });

    $('#chkSinFotoUsuarioEdit').change(function(e){
        if(this.checked){
            $('#btnUploadUsuarioEdit').attr('disabled',true);
            $('#btnUploadUsuarioEdit').removeClass('btn-gradient-primary');
            $('#btnUploadUsuarioEdit').addClass('btn-gradient-secondary');
        } else {
            $('#btnUploadUsuarioEdit').attr('disabled',false);
            $('#btnUploadUsuarioEdit').removeClass('btn-gradient-secondary');
            $('#btnUploadUsuarioEdit').addClass('btn-gradient-primary');
        }
    });

});