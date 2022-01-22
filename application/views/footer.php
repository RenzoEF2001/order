<!--</div>
</body>
<script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
<script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
<script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/chart.js/Chart.min.js"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            html: true
        });
    });
</script>

</html>-->


</div>
<!-- page-body-wrapper ends -->
</div>

<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo base_url(); ?>assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
<script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
<script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>
<script src="<?php echo base_url(); ?>assets/js/file-upload.js"></script>
<!-- RefValidator-->
<script src="<?php echo base_url(); ?>assets/js/RefValidator.js"></script>
<!-- DataTable-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.1/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.4/sr-1.0.1/datatables.min.js"></script>
<!-- Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--SweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Kodoti -->
<script src="<?php echo base_url(); ?>assets/js/KodotiLocalCache.js"></script>
<!-- Otros -->
<script src="<?php echo base_url(); ?>assets/js/page_empleado_view.js"></script>
<script src="<?php echo base_url(); ?>assets/js/page_cliente_view.js"></script>
<script src="<?php echo base_url(); ?>assets/js/page_sucursal_view.js"></script>
<script src="<?php echo base_url(); ?>assets/js/page_orden_create.js"></script>
<script src="<?php echo base_url(); ?>assets/js/page_orden_creadas.js"></script>
<script src="<?php echo base_url(); ?>assets/js/page_orden_pendiente.js"></script>
<script src="<?php echo base_url(); ?>assets/js/page_orden_atendida.js"></script>
<!-- End custom js for this page -->

<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip({
        html: true
    });
});
</script>

<script>
    $.extend( $.fn.dataTable.defaults, {
        searching: true,
        ordering:  true,
        "bLengthChange": false,
        scrollCollapse: false,
        "autoWidth": false,
        "language":{
            "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
        },
        buttons: [
            'excel'
        ],
        
        "dom":  '<"container-fluid p-4"'+
                    '<"row" '+
                        '<"col-sm-6 col-md-8 col-lg-9 col-xl-10"'+
                            'f'+
                        '>'+

                        '<"col-sm-6 col-md-4 col-lg-3 col-xl-2 text-center" '+
                            '<"contenedorDivAux d-flex justify-content-center text-center"'+
                                'i'+
                            '>'+
                        '>'+
                    '>'+
                '>'+
                'rt'+
                '<"d-flex d-flex justify-content-between p-4"'+
                        'p'+
                        'B'+
                '>'
        
    } );
    $(document).ready(function () {
        $('.page-link').css('background-color', '#B66DFF !important');
    });

</script>

</body>

</html>