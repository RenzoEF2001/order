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
<!-- End custom js for this page -->

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            html: true
        });
    });
</script>

<script>
        let btnContinuar = document.getElementById("btnContinuar");
        let btnAtras = document.getElementById("btnAtras");
        let btnCrear = document.getElementById("btnCrear");
        let paso1 = document.getElementById("paso1");
        let paso2 = document.getElementById("paso2");

        window.onload = function () {
            paso2.style = "display: none";
            btnCrear.disabled=true;
        };

        btnContinuar.addEventListener("click", e =>{
            btnAtras.hidden = false;
            btnContinuar.hidden = true;
            paso1.style = "display: none";
            paso2.style = "display: block";
            btnCrear.disabled=false;
        });

        btnAtras.addEventListener("click", e =>{
            btnAtras.hidden = true;
            btnContinuar.hidden = false;
            paso1.style = "display: block";
            paso2.style = "display: none";
            btnCrear.disabled=true;
        });

    </script>

</body>

</html>